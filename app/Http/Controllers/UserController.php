<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FormHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use domain\Facades\UserFacade\UserFacade;
use App\Http\Controllers\ParentController;
use Illuminate\Support\Facades\Validator;

class UserController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        if (Auth::user()->can('read_users')) {
            $response['tc'] = $this;
            $response['users'] = User::withTrashed()->orderBy('id', 'desc')->get();
            // $response['users'] = User::query()->withTrashed()->orderBy('id', 'desc')->get();
            // $response['users'] = UserFacade::getUsersByFilterAllTable($request->all());
            // $response['users'] = UserFacade::allWithTrashed();
            return view('pages.users.all')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to view users';
            return redirect()->back()->with($response);
        }
    }

    public function allUsers(Request $request)
    {
            $response['tc'] = $this;
            $response['users'] = UserFacade::getUsersByFilterAllTable($request->all());
            return view('pages.users.components.users_table')->with($response);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create_users')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|nullable',
                // 'email' => 'required|email|unique:users',
                'email' => ['required', 'email', 'unique:users,email', function ($attribute, $value, $fail) {
                    // Check the email format using a regular expression.
                    // This regex checks for the general email format without requiring a specific domain.
                    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $value)) {
                        $fail($attribute.' is not a valid email address.');
                    }
                }],
                'designation' => 'nullable|string',
                'password' => 'required|min:8',
            ]);
            // Check if the validation fails
            if ($validator->fails()) {
                $response['alert-danger'] = $validator->errors()->first();
                return redirect()->route('users.all')->with($response);
            }
            $user = UserFacade::create($request->except('_token'));
            $response['alert-success'] = 'User created successfully';
            return redirect()->route('users.edit', $user->id)->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to create users';
            return redirect()->back()->with($response);
        }
    }

    /**
     * Edit
     *
     * @param  int $id
     * @return void
     */
    public function edit(int $id)
    {
        if (Auth::user()->can('view_users')) {
            $response['tc'] = $this;
            $response['user'] = UserFacade::get($id);
            $response['groups'] = Permission::select('group_name')->distinct()->get();
            return view('pages.users.edit')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to view users';
            return redirect()->back()->with($response);
        }
        // if (Auth::user()->can('view_users')) {
        //     $response['tc'] = $this;
        //     $response['user'] = UserFacade::get($id);
        //     $response['groups'] = Permission::select('group_name')->distinct()->get();
        //     return view('pages.users.edit')->with($response);
        // } else {
        //     $response['alert-danger'] = 'You do not have permission to view users';
        //     return redirect()->back()->with($response);
        // }
    }

    /**
     * delete
     *
     * @param  int $user_id
     * @return void
     */
    public function delete(int $user_id)
    {
        if (Auth::user()->can('delete_users')) {
            UserFacade::delete($user_id);
            $response['alert-success'] = 'User deleted successfully';
            return redirect()->route('users.all')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to delete users';
            return redirect()->back()->with($response);
        }
    }

    public function update(Request $request, int $user_id)
    {
        if (Auth::user()->can('update_users')) {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|nullable',
                'email' => 'email',
                'designation' => 'nullable|string',
                'password' => 'nullable|min:8',
            ]);

            // Check if the validation fails
            if ($validator->fails()) {
                $response['alert-danger'] = $validator->errors()->first();
                return redirect()->route('users.edit', $user_id)->with($response);
            }
            UserFacade::update($user_id, $request->all());
            $response['alert-success'] = 'User permissions updated successfully';
            return redirect()->route('users.edit', $user_id)->with($response);
        }else{
            $response['alert-danger'] = 'You do not have permission to update users';
            return redirect()->back()->with($response);
        }
    }

    public function updatePassword(Request $request, int $id)
    {

        if (Auth::user()->can('update_users')) {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8|confirmed',
            ]);
            // Check if the validation fails
            if ($validator->fails()) {
                $response['alert-danger'] = $validator->errors()->first();
                return redirect()->route('users.edit', $id)->with($response);
            }
            UserFacade::updatePassword($request->all(), $id);
            $response['alert-success'] = 'User password updated successfully';
            return redirect()->route('users.edit', $id)->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to update users';
            return redirect()->route('user.index')->with($response);
        }

    }

    public function restore(int $id)
    {
        if (Auth::user()->can('restore_users')) {
            UserFacade::restore($id);
            $response['alert-success'] = 'User restored successfully';
            return redirect()->route('users.edit',$id)->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to delete users';
            return redirect()->route('user.index')->with($response);
        }
    }

    public function updatePermissions(Request $request, int $user_id)
    {
        if (Auth::user()->can('update_users')) {
            UserFacade::updatePermissions($user_id, $request->except('_token'));
            $response['alert-success'] = 'User permissions updated successfully';
            return redirect()->route('users.edit', $user_id)->with($response);
        }else{
            $response['alert-danger'] = 'You do not have permission to update users';
            return redirect()->back()->with($response);
        }
    }
}
