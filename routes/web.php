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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/restaurant', [App\Http\Controllers\HomeController::class, 'restaurant'])->name('home.restaurant');
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');

Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
Route::get('/events/{id}/{slug}', [App\Http\Controllers\EventsController::class, 'show'])->name('events.show');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/leads/{id}/show', [App\Http\Controllers\LeadsController::class, 'show'])->name('leads.show');
Route::put('/leads/{id}/resolved', [App\Http\Controllers\LeadsController::class, 'toggleResolved'])->name('leads.resolved');
Route::put('/leads/{id}/update', [App\Http\Controllers\LeadsController::class, 'update'])->name('leads.update');
Route::delete('/leads/{id}/delete', [App\Http\Controllers\LeadsController::class, 'delete'])->name('leads.delete');
Route::get('/configuration', [App\Http\Controllers\ConfigurationController::class, 'index'])->name('config');
Route::put('/configuration/{id}/meta', [App\Http\Controllers\ConfigurationController::class, 'updateMeta'])->name('config.meta');
Route::put('/configuration/{id}/brand', [App\Http\Controllers\ConfigurationController::class, 'toggleBrand'])->name('config.brand');
Route::put('/configuration/{id}/menu', [App\Http\Controllers\ConfigurationController::class, 'toggleMenu'])->name('config.menu');
Route::put('/configuration/{id}/about', [App\Http\Controllers\ConfigurationController::class, 'updateAbout'])->name('config.about');
Route::put('/configuration/{id}/events', [App\Http\Controllers\ConfigurationController::class, 'updateEvents'])->name('config.events');
Route::put('/configuration/{id}/contact', [App\Http\Controllers\ConfigurationController::class, 'updateContact'])->name('config.contact');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}/update', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');
Route::post('/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/category', [App\Http\Contorllers\CategoriesController::class, 'index'])->name('category.index');
Route::get('/category/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('category.create');
Route::post('/category/store', [App\Http\Controllers\CategoriesController::class, 'store'])->name('category.store');
Route::delete('/category/{id}/delete', [App\Http\Controllers\CategoriesController::class, 'delete'])->name('category.delete');
Route::get('/posts/index', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}/update', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}/delete', [App\Http\Controllers\PostsController::class, 'delete'])->name('posts.delete');
