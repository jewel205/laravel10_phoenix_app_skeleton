<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('/expired-page', 'expired-page')->name('expired-page');

    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,

    ]);

    Route::get('permissions/{id}/remove',[PermissionController::class, 'remove'])->name('permissions.remove');

    /**** Custom User Routes ****/
    Route::get('users/{id}/status-update',[UserController::class, 'statusUpdate'])->name('users.statusChange');
    Route::get('users/{id}/password-change',[UserController::class, 'changePassword'])->name('users.passwordChange');
    Route::put('password-update/users/{id}/',[UserController::class, 'updatePassword'])->name('users.passwordUpdate');
    Route::get('users/{id}/own-password-change',[UserController::class, 'changeOwnPassword'])->name('users.changeOwnPassword');
    Route::put('own-password-update/users/{id}/',[UserController::class, 'updateOwnPassword'])->name('users.updateOwnPassword');


});
