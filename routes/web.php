<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [App\Http\Controllers\UAM\PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', App\Http\Controllers\UAM\PermissionController::class);

    // Roles
    Route::delete('roles/destroy', [App\Http\Controllers\UAM\RoleController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', App\Http\Controllers\UAM\RoleController::class);

    // Users
    Route::delete('users/destroy', [App\Http\Controllers\UserController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', App\Http\Controllers\UserController::class,);

    // Audit Logs
    Route::resource('audit_logs', App\Http\Controllers\UAM\AuditLogController::class, ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
