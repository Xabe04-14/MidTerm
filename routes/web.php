<?php


use App\Http\Controllers\PageController;
use App\Http\Controllers\CreateTable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ViewErrorBag;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Route::get('/database_ban_hang', [CreateTable::class, 'create_Table']);

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);
Route::get('/detail/{id}', [PageController::class, 'getDetail']);							

Route::get('/contact', [PageController::class, 'showContact']);
Route::get('/aboutus', [PageController::class, 'showAbout']);
Route::get('/admin', [PageController::class, 'getIndexAdmin']);
Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');	
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);											
Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit']);												
Route::post('/admin-edit', [PageController::class, 'postAdminEdit'])->name('admin-edit');
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);	