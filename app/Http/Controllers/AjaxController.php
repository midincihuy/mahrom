<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Maatwebsite\Excel\Facades\Excel;

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

  public function excel()
  {
    Excel::create('User', function($excel){
      // Set the title
      $excel->setTitle('User List');

      // Chain the setters
      $excel->setCreator('Hamidin Hidayat')
            ->setLastModifiedBy('Hamidin Hidayat')
            ->setKeywords('user')
            ->setSubject('User List')
            ->setCompany('Midincihuy Corp');

      // Call them separately
      $excel->setDescription('List of user');
      $excel->sheet('User', function($sheet) {
        // Sheet manipulation
        $roles = Role::all();
        // $sheet->fromModel($model);
        $arr = array();
        foreach($roles as $role){
          foreach($role->permissions as $perm){
            $data = array($role->name, $perm->name);
            array_push($arr, $data);
          }
        }
        $sheet->fromArray($arr, null, 'A1', false, false)
          ->prependRow(array('Role Name' ,'Permission Name'));


      });
    })
    ->download('xls');

  }

}
