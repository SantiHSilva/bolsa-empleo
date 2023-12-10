<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\TodoController::class, 'index'])->name('home')->middleware('auth');
Route::post('/store', [App\Http\Controllers\TodoController::class, 'store'])->name('store')->middleware('auth');
Route::delete('/delete/{id}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('delete')->middleware('auth');

// Perfil

Route::post('/perfil/create', [App\Http\Controllers\PerfilController::class, 'create'])->name('perfil.create')->middleware('auth');
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.view')->middleware('auth');
Route::get('/perfil/edit', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit')->middleware('auth');
Route::put('/perfil/update', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update')->middleware('auth');

// Empresa

Route::get('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create')->middleware('auth');
Route::post('/empresa/store', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresa.store')->middleware('auth');
Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa.index')->middleware('auth');

// Skills CRUD

Route::get('/skills', [App\Http\Controllers\SkillsController::class, 'index'])->name('skills.index')->middleware('auth');
Route::get('/skills/create', [App\Http\Controllers\SkillsController::class, 'create'])->name('skills.create')->middleware('auth');
Route::post('/skills/store', [App\Http\Controllers\SkillsController::class, 'store'])->name('skills.store')->middleware('auth');
Route::delete('/skills/delete/{id}', [App\Http\Controllers\SkillsController::class, 'destroy'])->name('skills.delete')->middleware('auth');
Route::get('/skills/edit/{id}', [App\Http\Controllers\SkillsController::class, 'edit'])->name('skills.edit')->middleware('auth');
Route::put('/skills/update/{id}', [App\Http\Controllers\SkillsController::class, 'update'])->name('skills.update')->middleware('auth');

// Roles CRUD

Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/roles/create', [App\Http\Controllers\RolesController::class, 'create'])->name('roles.create')->middleware('auth');
Route::post('/roles/store', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.store')->middleware('auth');
Route::delete('/roles/delete/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('roles.delete')->middleware('auth');
Route::get('/roles/edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::put('/roles/update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('roles.update')->middleware('auth');
