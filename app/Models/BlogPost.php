<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
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
        $posts = BlogPost::select('*')->orderBy('id', 'desc');

        if (isset($filters['title'])) {
            $posts->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['content'])) {
            $posts->where('content', 'like', '%' . $filters['content'] . '%');
        }

        if (isset($filters['user_id'])) {
            $posts->where('user_id', $filters['user_id']);
        }

        if (isset($filters['count'])) {
            return $posts->orderBy('id', 'desc')->paginate($filters['count']);
        } else {
            return $posts->orderBy('id', 'desc')->paginate(20);
        }
    }
}
