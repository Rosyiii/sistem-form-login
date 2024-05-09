<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

// starting
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/', [UserController::class, 'loginSucces'])->middleware('auth');
Route::get('/data_author', [UserController::class, 'indexAuthors'])->middleware('admin');

Route::get('/registrasi', [UserController::class, 'indexRegis'])->middleware('admin');
Route::post('/registrasi', [UserController::class, 'store']);

// Post
Route::get('/tambah_post', [PostController::class, 'indexTambah'])->middleware('auth');
Route::post('/tambah_post', [PostController::class, 'store']);
Route::get('/detail_post/{id:id}', [PostController::class, 'detail'])->middleware('auth');

// kategori
Route::get('/tambah_kategori', [KategoriController::class, 'indexTambah'])->middleware('admin');
Route::post('/tambah_kategori', [KategoriController::class, 'store']);
Route::get('/data_kategori', [KategoriController::class, 'index'])->middleware('admin');

// Destroy
Route::post('/post/{id:id}', [PostController::class, 'destroy'])->middleware('auth');
Route::post('/data_author/{id:id}', [UserController::class, 'destroy'])->middleware('auth');
Route::post('/data_kategori/{id:id}', [KategoriController::class, 'destroy'])->middleware('auth');

// edit
Route::get('/edit_post/{id:id}', [PostController::class, 'edit'])->middleware('auth');
Route::post('/edit_post/{id:id}', [PostController::class, 'update']);

Route::get('/edit_author/{id:id}', [UserController::class, 'edit'])->middleware('auth');
Route::post('/edit_author/{id:id}', [UserController::class, 'update']);

Route::get('/edit_kategori/{id:id}', [KategoriController::class, 'indexEdit'])->middleware('admin');
Route::post('/edit_kategori/{id:id}', [KategoriController::class, 'update']);