<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\KadisController;
use App\Enums\Role;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\adminBidang;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth', 'role:' . Role::Admin->value])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/dataPegawai', [AdminController::class, 'showAll'])->name('admin.users.dataPegawai');
    Route::get('/admin/users/filter', [App\Http\Controllers\AdminController::class, 'filterByBidang'])->name('admin.users.filter');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/achievements', [BidangController::class, 'index'])->name('admin.index');
    Route::get('/admin/achievements/create', [BidangController::class, 'create'])->name('admin.create');
    Route::post('/admin/achievements', [BidangController::class, 'store'])->name('admin.store');
});

Route::middleware(['auth', 'checkRole:bidang'])->group(function () {
    Route::get('/achievements/bidang', [BidangController::class, 'bidangIndex'])->name('achievements.bidangIndex');
    Route::get('/achievements/bidang/{achievement}/edit', [BidangController::class, 'bidangEdit'])->name('achievements.bidangEdit');
    Route::put('/achievements/bidang/{achievement}', [BidangController::class, 'bidangUpdate'])->name('achievements.bidangUpdate');
    Route::get('/achievements/{bidang}/editMonthly', [BidangController::class, 'editMonthly'])->name('achievements.editMonthly');
    Route::put('/achievements/{bidang}/updateMonthly', [BidangController::class, 'updateMonthly'])->name('achievements.updateMonthly');
    // Route::get('/achievements/{id}/edit', [BidangController::class, 'editMonthlyAchievement'])->name('achievements.edit');
    Route::get('/achievements/edit/{id}/{bidangId}/{bulan}', [BidangController::class, 'editMonthlyAchievement'])->name('achievements.edit');
    Route::put('/achievements/{id}', [BidangController::class, 'updateMonthlyAchievement'])->name('achievements.update');
});

Route::middleware(['auth', 'checkRole:kadis'])->group(function () {
    Route::get('/kadis/dashboard', [KadisController::class, 'index'])->name('kadis.dashboard');
    Route::get('/kadis/{bidang}/data-bidang', [KadisController::class, 'dataBidang'])->name('kadis.dataBidang');
    Route::get('/kadis/data-bidang', [KadisController::class, 'dataBidang'])->name('kadis.dataBidang');
    Route::get('/kadis/view-monthly/{bidang}', [KadisController::class, 'viewMonthly'])->name('kadis.viewMonthly');
    Route::get('/kadis/inbox', [KadisController::class, 'inbox'])->name('kadis.inbox');
});

Route::middleware(['auth', 'role:' . Role::Bidang->value])->group(function () {
    Route::get('/bidang', [adminBidang::class, 'index'])->name('bidang.dashboard');
});

Route::middleware(['auth', 'role:' . Role::Kadis->value])->group(function () {
    Route::get('/kadis', [KadisController::class, 'index'])->name('kadis.dashboard');
});
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
Route::post('/bidangs/{bidang}/comments', [CommentController::class, 'store'])->name('comments.store');



Route::get('/comments/{bidang_id}/{bulan}', [CommentController::class, 'show'])->name('comments.show');
Route::post('/comments/{bidang_id}/{bulan}', [CommentController::class, 'store'])->name('comments.store');







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
