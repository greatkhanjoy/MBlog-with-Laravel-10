<?php

use App\Models\Article;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TagController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    $notifications = Notification::where('user_id', Auth()->user()->id)->paginate(10);
    return view('dashboard', compact('notifications'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('comments', CommentController::class)->only('store');
    Route::put('/notification/update/{notification}', [NotificationController::class, 'update'])->name('notification.update');
    Route::put('/notification/bulk-update/{user}', [NotificationController::class, 'updateAll'])->name('notification.bulkupdate');
    Route::delete('/notification/delete/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');
    Route::delete('/notification/bulk-delete/{id}', [NotificationController::class, 'destroyAllRead'])->name('notification.destroyAllRead');
    Route::delete('/notification/bulk-deleteall/{id}', [NotificationController::class, 'destroyAll'])->name('notification.destroyAll');
});

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('article', AdminController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
});

Route::group(['middleware' => ['auth', 'role:editor'], 'prefix' => 'editor', 'as' => 'editor.'], function () {
    Route::get('dashboard', [EditorController::class, 'dashboard'])->name('dashboard');
    Route::resource('article', EditorController::class);
});


Route::get('/category/{slug}', [HomeController::class, 'categoryPosts'])->name('article.category');
Route::get('/tag/{slug}', [HomeController::class, 'tagPosts'])->name('article.tag');
Route::get('/author/{username}', [HomeController::class, 'authorPosts'])->name('article.author');
Route::get('/articles', [HomeController::class, 'articles'])->name('articles');
Route::get('/{category}/{slug}', [HomeController::class, 'show'])->name('article.show');
Route::get('/search', [HomeController::class, 'search'])->name('article.search');



require __DIR__.'/auth.php';


Route::get('/404', function () {
    return view('404');
})->name('404');

Route::fallback(function () {
    return view('404');
});