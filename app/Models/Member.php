<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'designation',
        'batch',
        'image_id',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public static function getByFilter($filters)
    {
        $members = Member::select('*')->orderBy('id', 'desc');

        if (isset($filters['name']) && $filters['name'] != '') {
            $members->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['email']) && $filters['email'] != '') {
            $members->where('email', 'like', '%' . $filters['email'] . '%');
        }

        if (isset($filters['designation']) && $filters['designation'] != '') {
            $members->where('designation', 'like', '%' . $filters['designation'] . '%');
        }

        if (isset($filters['batch']) && $filters['batch'] != '') {
            $members->where('batch', 'like', '%' . $filters['batch'] . '%');
        }

        if (isset($filters['count'])) {
            return $members->orderBy('id', 'desc')->paginate($filters['count']);
        } else {
            return $members->orderBy('id', 'desc')->paginate(20);
        }
    }
}
