<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','role:administrator'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::resource('permissions', 'Admin\PermissionsController');
  Route::resource('roles', 'Admin\RolesController');
  Route::resource('users', 'Admin\UsersController');
});
Route::get('/ajax/user', 'AjaxController@user')->name('ajax_user');
Route::get('/ajax/permission', 'AjaxController@permission')->name('ajax_permission');
Route::get('/ajax/role', 'AjaxController@role')->name('ajax_role');
