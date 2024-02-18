<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserDocument extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'document_id',
        'status',
        'downloaded_at',
        'reply_at',
        'created_user_id',
    ];

    protected $appends = [
        'created_date',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }
    public function getRefNoAttribute()
    {
        return $this->document ? $this->document->ref_no : null;
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at ? Carbon::parse($this->created_at) : null;
    }
    public function getDocumentNameAttribute()
    {
        return $this->document ? $this->document->title : null;
    }
    public function getSenderNameAttribute()
    {
        return $this->user ? $this->user->name : null;
    }

    public function getDocumentUsers($data)
    {
        // dd($data['document_id']);
        // $documents = $this->with('user', 'document');
        // $documents = $this->where('document_id',$data['document_id'])->get();

        // // dd($document_users);

        // // return $documents->orderBy('id', 'desc')->paginate(1);
        // if (isset($data['count'])) {
        //     return $documents->orderBy('id', 'desc')->paginate($data['count']);
        // }else{
        //     return $documents->orderBy('id', 'desc')->paginate(20);
        // }

        // Retrieve documents based on the specified document_id
        $documents = $this->where('document_id', $data['document_id']);

        // Apply pagination to the results
        if (isset($data['count'])) {
            return $documents->orderBy('id', 'desc')->paginate($data['count']);
        } else {
            return $documents->orderBy('id', 'desc')->paginate(20);
        }
    }

    public function getUserDocuments($data)
    {
        if ($data['recipient'] != 0) {
            $query = $this->where('created_user_id', Auth::id())->where('user_id', $data['recipient'])->orderBy('id', 'desc');
        } else {
            $query = $this->where('created_user_id', Auth::id())->orderBy('id', 'desc');
        }


        if (isset($data['date'])) {
            $query->whereDate('created_at', $data['date']);
        }

        $documents = $query->paginate(20);

        return $documents;
    }


    public function getUserDocumentsAll($data)
    {
        if ($data['recipient'] != 0) {
            $query = $this->where('created_user_id', Auth::id())->where('user_id', $data['recipient'])->orderBy('id', 'desc');
        } else {
            $query = $this->where('created_user_id', Auth::id())->orderBy('id', 'desc');
        }


        if (isset($data['date'])) {
            $query->whereDate('created_at', $data['date']);
        }

        $documents = $query->get();

        return $documents;
    }
}
