<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'user_id',
        'image_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public static function getByFilter($filters)
    {
        $events = Event::select('*')->orderBy('id', 'desc');

        if (isset($filters['title'])) {
            $events->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['start_date'])) {
            $events->where('start_date', '>=', $filters['start_date']);
        }

        if (isset($filters['end_date'])) {
            $events->where('end_date', '<=', $filters['end_date']);
        }

        if(isset($filters['user_id'])){
            $events->where('user_id', $filters['user_id']);
        }

        if (isset($filters['count'])) {
            return $events->orderBy('id', 'desc')->paginate($filters['count']);
        } else {
            return $events->orderBy('id', 'desc')->paginate(20);
        }
    }
}
