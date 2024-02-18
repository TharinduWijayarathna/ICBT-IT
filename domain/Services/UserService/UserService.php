<?php

namespace domain\Services\UserService;

use App\Models\Banner;
use App\Models\Document;
use App\Models\User;
use domain\Facades\ImageFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->users->all();
    }

    public function allWithTrashed()
    {
        return $this->users->withTrashed()->all();
    }

    /**
     * get
     *
     * @param  mixed $user_id
     * @return void
     */
    public function get($user_id)
    {
        return $this->users->withTrashed()->find($user_id);
    }


    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->users->create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'designation' => $data['designation'],
                'password' => bcrypt($data['password'])
            ]
        );
    }

    /**
     * update
     *
     * @param  mixed $user_id
     * @param  mixed $data
     * @return void
     */
    public function update($user_id, array $data)
    {
        $user = $this->users->find($user_id);
        return $user->update($this->edit($user, $data));
    }

    protected function edit(User $user, $data)
    {
        return array_merge($user->toArray(), $data);
    }

    /**
     * delete
     *
     * @param  mixed $user_id
     * @return void
     */
    public function delete($user_id)
    {
        $user = $this->users->find($user_id);
        return $user->delete();

    }

    public function updatePermissions($user_id, $data)
    {
        $permissions = array_keys($data);
        $user = $this->users->find($user_id);
        $user->syncPermissions($permissions);
    }

    public function updatePassword(array $data, int $user_id)
    {
        $user = $this->users->withTrashed()->find($user_id);
        // $user = $this->users->find($user_id);
        $user->password = bcrypt($data['password']);
        return $user->update();
    }

    public function restore(int $user_id)
    {
        $users = $this->users->withTrashed()->find($user_id);
        $users->restore();
    }

    public function getWithTrashed(int $user_id)
    {
        return $this->users->withTrashed()->find($user_id);
    }

    /**
     * getUsersByFilterAllTable
     *
     * @param  array $data
     * @return void
     */
    public function getUsersByFilterAllTable($data)
    {
        return $this->users->getUsersByFilterAllTable($data);
    }
}
