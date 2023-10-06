<?php

use App\Http\Controllers\Admin\AdditionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ReviewerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/show_account', [AdminController::class, 'show_account'])->name('show_account');
    Route::get('/account', [AdminController::class, 'account'])->name('account');
    Route::put('/account/update',[AdminController::class,'update'])->name('account.update')->middleware('auth');
    Route::resource('additions', AdditionController::class);
    Route::resource('users', UserController::class);
    Route::resource('reviewers', ReviewerController::class);
    Route::resource('roles', RoleController::class);
    Route::get('/additions/{id}/apply', [AdminController::class, 'apply'])->name('apply')->middleware('auth');
    Route::get('/additions/{id}/payment', [AdminController::class, 'payment'])->name('payment')->middleware('auth');
    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});
Route::get('/', [SiteController::class, 'index'])->name('site.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('');
Route::get('/reviewers/test/{id}', [ReviewerController::class, 'test'])->name('test');
