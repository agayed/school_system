<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


Route::controller(AdminController::class,)->group(function () {
    Route::get('/admin/logout', 'Logout')->name('agmin.logout');
});
// =============================UserController==========================
Route::controller(UserController::class,)->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/view', 'UserView')->name('user.view');
        Route::get('/add', 'AddUser')->name('users.add');
        Route::post('/store', 'UserStore')->name('users.store');
        Route::get('/edit/{id}', 'EditUser')->name('users.edit');
        Route::post('/update/{id}', 'UpdateUser')->name('users.update');
        Route::get('/delete/{id}', 'DeleteUser')->name('users.delete');
    });
});

// =============================ProfileController==========================

Route::controller(ProfileController::class,)->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/view', 'ProfileView')->name('profile.view');
        Route::get('/edit', 'ProfileEdit')->name('profile.edit');
        Route::post('/store', 'ProfileStore')->name('profile.store');
        Route::get('/password/view', 'PasswordView')->name('password.view');
        Route::post('/password/update',  'PasswordUpdate')->name('password.update');
    });
});