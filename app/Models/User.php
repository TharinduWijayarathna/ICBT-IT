<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'designation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * getUsersByFilterAllTable
     *
     * @param  array $data
     * @return void
     */
    public function getUsersByFilterAllTable($data)
    {
        $users = $this->withTrashed();
        if (isset($data['name'])) {
            $users = $users->where('name', 'like', '%' . $data['name'] . '%');
        }
        if (isset($data['email'])) {
            $users = $users->where('email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['count'])) {
            return $users->orderBy('id', 'desc')->paginate($data['count']);
        } else {
            return $users->orderBy('id', 'desc')->paginate(20);
        }
    }


}
