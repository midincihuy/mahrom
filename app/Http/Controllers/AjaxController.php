<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AjaxController extends Controller
{
  public function user()
  {
    $users = User::with('roles')->select('users.*');
    return DataTables::of($users)->make(true);
  }

  public function permission()
  {
    $permissions = Permission::query();
    return DataTables::of($permissions)->make(true);
  }

  public function role()
  {
    $query = Role::with('permissions')->select('roles.*');
    return DataTables::eloquent($query)
      ->addColumn('permissions', function (Role $roles) {
                    return $roles->permissions->map(function($permission) {
                        return $permission->name;
                    })->implode(',');

                })
      ->make(true);
  }

}
