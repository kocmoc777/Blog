<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix'=> 'admin'], function () {
    Route::get('/', 'IndexController');
    Route::get('/home_pages', 'IndexController')->name('admin.main.index');
});/////////////////////////////

Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix'=> 'categories'], function () {
    Route::get('/', 'IndexController');
});



Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'prefix'=> 'post'], function () {
    Route::get('/', 'IndexController')->name('admin.post.index'); // Список всіх постів
    Route::get('/create', 'CreateController')->name('admin.post.create'); // Форма створення поста
    Route::post('/', 'StoreController')->name('admin.post.store'); // Збереження нового поста

    Route::get('/{post}/edit', 'EditController')->name('admin.post.edit'); // Форма редагування поста
    Route::patch('/{post}', 'UpdateController')->name('admin.post.update'); // Оновлення поста
    Route::delete('/{post}', 'DeleteController')->name('admin.post.delete'); // Видалення поста
    Route::get('/{post}', 'ShowController')->name('admin.post.show'); // Перегляд конкретного поста





});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix'=> 'categories'], function () {
    Route::get('/', 'IndexController')->name('admin.categories.index');
    Route::get('/create', 'CreateController')->name('admin.categories.create');
    Route::post('/', 'StoreController')->name('admin.categories.store');
    Route::get('/search', 'IndexController')->name('admin.categories.search');
    Route::get('/categories/{category}/edit', 'EditController')->name('admin.categories.edit');
    Route::patch('/categories/{category}', 'UpdateController')->name('admin.categories.update');
    Route::delete('/categories/{category}', 'DeleteController')->name('admin.categories.delete');
    Route::get('/categories/{category}', 'ShowController')->name('admin.categories.show');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix'=> 'tags'], function () {
    Route::get('/', 'IndexController')->name('admin.tag.index');
    Route::get('/create', 'CreateController')->name('admin.tag.create');
    Route::post('/', 'StoreController')->name('admin.tag.store');
    Route::get('/search', 'IndexController')->name('admin.tag.search');
    Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
    Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
    Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
    Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin\User', 'prefix'=> 'users'], function () {
    Route::get('/', 'IndexController')->name('admin.users.index');
    Route::get('/create', 'CreateController')->name('admin.users.create');
    Route::post('/', 'StoreController')->name('admin.users.store');
    Route::get('/search', 'IndexController')->name('admin.users.search');
    Route::get('/users/{user}/edit', 'EditController')->name('admin.users.edit');
    Route::patch('/users/{user}', 'UpdateController')->name('admin.users.update');
    Route::delete('/users/{user}', 'DeleteController')->name('admin.users.delete');
    Route::get('/users/{user}', 'ShowController')->name('admin.users.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
