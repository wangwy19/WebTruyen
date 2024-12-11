<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ChapterController;





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


//user
Route::get('/login-user', [LoginController::class, 'LoginUser'])->name('login_user');
Route::get('/register-user', [RegisterController::class, 'RegisterUser'])->name('user.register_user');
Route::get('/forgotpass-user', [ForgotPasswordController::class, 'ForgotPassword'])->name('user.forgot_password');


//admin
Route::get('/login-admin', [LoginController::class, 'LoginAdmin'])->name('admin.login_admin');
Route::get('/', [HomeController::class, 'index']);



Route::prefix('/admin')->name('admin.')->group(function () {
    //comic
    Route::get('/list-comic', [ComicController::class, 'index'])->name('list_comic_admin');
    Route::get('/add-comic', [ComicController::class, 'AddComic'])->name('add_comic_admin');
    Route::get('/edit-comic', [ComicController::class, 'EditComic'])->name('edit_comic_admin');
    Route::get('/restore-comic', [ComicController::class, 'RestoreComic'])->name('restore_comic_admin');

    //author
    Route::get('/list-author', [AuthorController::class, 'index'])->name('list_author_admin');
    Route::get('/add-author', [AuthorController::class, 'AddAuthor'])->name('add_author_admin');
    Route::get('/edit-author', [AuthorController::class, 'EditAuthor'])->name('edit_author_admin');
    Route::get('/restore-author', [AuthorController::class, 'RestoreAuthor'])->name('restore_author_admin');

    //chapter
    Route::get('/list-chapter', [ChapterController::class, 'index'])->name('list_chapter_admin');
    Route::get('/add-chapter', [ChapterController::class, 'AddChapter'])->name('add_chapter_admin');
    Route::get('/edit-chapter', [ChapterController::class, 'EditChapter'])->name('edit_chapter_admin');
    Route::get('/restore-chapter', [ChapterController::class, 'RestoreChapter'])->name('restore_chapter_admin');

    //genre
    Route::get('/list-genre', [GenreController::class, 'index'])->name('list_genre_admin');
    Route::get('/add-genre', [GenreController::class, 'AddGenre'])->name('add_genre_admin');
    Route::get('/edit-genre', [GenreController::class, 'EditGenre'])->name('edit_genre_admin');
    Route::get('/restore-genre', [GenreController::class, 'RestoreGenre'])->name('restore_genre_admin');

    //level
    Route::get('/list-level', [LevelController::class, 'index'])->name('list_level_admin');
    Route::get('/add-level', [LevelController::class, 'AddLevel'])->name('add_level_admin');
    Route::get('/edit-level', [LevelController::class, 'EditLevel'])->name('edit_level_admin');
});
