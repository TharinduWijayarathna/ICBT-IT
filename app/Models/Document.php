<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentFile;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'file',
        'created_by',
        'updated_by',
        'date',
        'ref_no',
        'sender_name',
    ];

    protected $appends = [
        'reply_date',
    ];

    public function getByFilterAllTable($data)
    {
        if(Auth::user()->email=='admin@gmail.com'){
            $documents = $this;
        }else{
            $documents = $this->where('created_by', Auth::id());
        }


        if (isset($data['title'])) {
            $documents = $documents->where('title', 'like', '%' . $data['title'] . '%');
        }
        if (isset($data['sender_name'])) {
            $documents = $documents->where('sender_name', 'like', '%' . $data['sender_name'] . '%');
        }
        if (isset($data['from_date']) && isset($data['to_date'])) {
            $documents = $documents->whereBetween('date', [$data['from_date'], $data['to_date']]);
        } elseif (isset($data['from_date'])) {
            $documents = $documents->whereDate('date', '>=', $data['from_date']);
        } elseif (isset($data['to_date'])) {
            $documents = $documents->whereDate('date', '<=', $data['to_date']);
        }
        // if (isset($data['date'])) {
        //     $documents = $documents->whereDate('date', $data['date']);
        // }
        if (isset($data['ref_no'])) {
            $documents = $documents->where('ref_no', 'like', '%' . $data['ref_no'] . '%');
        }
        if (isset($data['count'])) {
            return $documents->orderBy('id', 'desc')->paginate($data['count']);
        }else{
            return $documents->orderBy('id', 'desc')->paginate(20);
        }
    }

    public function getMyDocumentsByFilterAllTable($data)
    {
        $documents = $this->whereHas('documentUsers', function ($query) {
            $query->where('user_id', Auth::id());
        });
        if (isset($data['title'])) {
            $documents = $documents->where('title', 'like', '%' . $data['title'] . '%');
        }
        if (isset($data['sender_name'])) {
            $documents = $documents->where('sender_name', 'like', '%' . $data['sender_name'] . '%');
        }
        if (isset($data['from_date']) && isset($data['to_date'])) {
            $documents = $documents->whereBetween('date', [$data['from_date'], $data['to_date']]);
        } elseif (isset($data['from_date'])) {
            $documents = $documents->whereDate('date', '>=', $data['from_date']);
        } elseif (isset($data['to_date'])) {
            $documents = $documents->whereDate('date', '<=', $data['to_date']);
        }
        // if (isset($data['date'])) {
        //     $documents = $documents->whereDate('date',$data['date']);
        // }
        if (isset($data['ref_no'])) {
            $documents = $documents->where('ref_no', 'like', '%' . $data['ref_no'] . '%');
        }
        if (isset($data['count'])) {
            return $documents->orderBy('id', 'desc')->paginate($data['count']);
        }else{
            return $documents->orderBy('id', 'desc')->paginate(20);
        }
    }

    public function files()
    {
        return $this->hasMany(DocumentFile::class);
    }



    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserDocument::class, 'document_id', 'user_id');
    }

    public function documentUsers()
    {
        return $this->hasMany(UserDocument::class, 'document_id', 'id');
    }
    public function my_documents()
    {
        return $this->hasOne(UserDocument::class, 'document_id', 'id')->where('user_id', Auth::id());
    }

    public function getReplyDateAttribute()
    {
        return $this->my_documents? $this->my_documents->reply_at : null;
    }
}
