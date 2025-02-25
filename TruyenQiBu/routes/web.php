<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;

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
Route::get('/', [HomeController::class, 'HomePage'])->name('user.homepage');
Route::get('/manage-account', [UserController::class, 'UserAccount'])->name('user.account_manage')->middleware(['userLogin']);
Route::get('/comic/{slug}', [ComicController::class, 'ComicPage'])->name('user.comicpage');
Route::get('/comic/{slug}/{chapter_number}', [ChapterController::class, 'ChapterPage'])->name('user.chapterpage')->middleware(['userLogin']);
Route::get('/explore', [ComicController::class, 'ExplorePage'])->name('user.explorepage');
Route::get('/notification', [NotificationController::class, 'NotificationPage'])->name('user.notificationpage')->middleware(['userLogin']);

Route::post('/login-user', [LoginController::class, 'LoginUser'])->name('user.login_user');
Route::get('/logout-user', [LoginController::class, 'LogoutUser'])->name('user.logout_user');

Route::post('/update-avatar', [UserController::class, 'UpdateAccount'])->name('user.update_avatar');
Route::post('/update-fullname', [UserController::class, 'UpdateAccount'])->name('user.update_fullname');

Route::post('/update-password', [UserController::class, 'UpdateAccount'])->name('user.update_password');
Route::post('/refresh-password', [UserController::class, 'RefreshPassword'])->name('user.refresh_password');
Route::post('/refresh-password', [UserController::class, 'RefreshPassword'])->name('user.refresh_password');


Route::get('/favorites/add', [UserController::class, 'AddFavorite'])->name('user.add_favorite')->middleware(['userLogin']);
Route::get('/my-favorites', [UserController::class, 'GetFavorites'])->name('user.my_favorite')->middleware(['userLogin']);


Route::post('/comment', [UserController::class, 'AddComment'])->name('user.comment');




//admin
Route::get('/login-admin', [LoginController::class, 'LoginAdmin'])->name('admin.login_admin')->middleware(['checklogoutadmin']);
Route::get('/logout-admin', [LoginController::class, 'LogoutAdmin'])->name('admin.logout_admin');
Route::post('/login-admin', [LoginController::class, 'HandleLoginAdmin'])->name('admin.handle_login_admin');
Route::prefix('/admin')->middleware(['checkloginadmin'])->name('admin.')->group(function () {
    //comic
    Route::get('/list-comic', [ComicController::class, 'index'])->name('list_comic_admin');
    Route::get('/add-comic', [ComicController::class, 'AddComic'])->name('add_comic_admin');
    Route::get('/edit-comic/{id}', [ComicController::class, 'EditComic'])->name('edit_comic_admin');
    Route::post('/update-comic/{id}', [ComicController::class, 'UpdateComic'])->name('update_comic_admin');
    Route::post('/store-comic', [ComicController::class, 'StoreComic'])->name('store_comic_admin');
    Route::post('/delete-comic', [ComicController::class, 'DeleteComic'])->name('delete_comic_admin');


    //author
    Route::get('/list-author', [AuthorController::class, 'index'])->name('list_author_admin');
    Route::get('/add-author', [AuthorController::class, 'AddAuthor'])->name('add_author_admin');
    Route::post('/store-author', [AuthorController::class, 'StoreAuthor'])->name('store_author_admin');
    Route::get('/edit-author/{id}', [AuthorController::class, 'EditAuthor'])->name('edit_author_admin');
    Route::post('/update-author/{id}', [AuthorController::class, 'UpdateAuthor'])->name('update_author_admin');
    Route::post('/delete-author', [AuthorController::class, 'DeleteAuthor'])->name('delete_author_admin');
    Route::get('/restore-author', [AuthorController::class, 'RestoreAuthor'])->name('restore_author_admin');



    //chapter
    Route::get('/list-chapter', [ChapterController::class, 'index'])->name('list_chapter_admin');
    Route::get('/add-chapter', [ChapterController::class, 'AddChapter'])->name('add_chapter_admin');
    Route::post('/store-chapter', [ChapterController::class, 'StoreChapter'])->name('store_chapter_admin');
    Route::get('/edit-chapter/{id}', [ChapterController::class, 'EditChapter'])->name('edit_chapter_admin');
    Route::post('/update-chapter/{id}', [ChapterController::class, 'UpdateChapter'])->name('update_chapter_admin');
    Route::post('/delete-chapter', [ChapterController::class, 'DeleteChapter'])->name('delete_chapter_admin');
    Route::get('/restore-chapter', [ChapterController::class, 'RestoreChapter'])->name('restore_chapter_admin');

    //genre
    Route::get('/list-genre', [GenreController::class, 'index'])->name('list_genre_admin');
    Route::get('/add-genre', [GenreController::class, 'AddGenre'])->name('add_genre_admin');
    Route::post('/store-genre', [GenreController::class, 'StoreGenre'])->name('store_genre_admin');
    Route::get('/edit-genre/{id}', [GenreController::class, 'EditGenre'])->name('edit_genre_admin');
    Route::post('/update-genre/{id}', [GenreController::class, 'UpdateGenre'])->name('update_genre_admin');
    Route::post('/delete-genre', [GenreController::class, 'DeleteGenre'])->name('delete_genre_admin');
    Route::post('/restore-genre/{id}', [GenreController::class, 'RestoreGenre'])->name('restore_genre_admin');

    //level
    Route::get('/list-level', [LevelController::class, 'index'])->name('list_level_admin');
    Route::get('/add-level', [LevelController::class, 'AddLevel'])->name('add_level_admin');
    Route::post('/store-level', [LevelController::class, 'StoreLevel'])->name('store_level_admin');
    Route::get('/edit-level/{id}', [LevelController::class, 'EditLevel'])->name('edit_level_admin');
    Route::post('/update-level/{id}', [LevelController::class, 'UpdateLevel'])->name('update_level_admin');
    Route::post('/delete-level', [LevelController::class, 'DeleteLevel'])->name('delete_level_admin');

    //user
    Route::get('/list-user', [UserController::class, 'index'])->name('list_user_admin')->middleware(['checksuperadmin']);
    Route::get('/manage-account', [UserController::class, 'ManageAccount'])->name('manage_user_admin')->middleware(['checksuperadmin']);
    Route::post('/edit-account', [UserController::class, 'EditAccount'])->name('edit_account_admin')->middleware(['checksuperadmin']);
    Route::get('/add-user', [UserController::class, 'AddUser'])->name('add_user_admin')->middleware(['checksuperadmin']);
    Route::post('/store-user', [UserController::class, 'StoreUser'])->name('store_user_admin')->middleware(['checksuperadmin']);
    Route::post('/reset-pass', [UserController::class, 'ResetPass'])->name('reset_pass_admin')->middleware(['checksuperadmin']);
    Route::post('/delete-user', [UserController::class, 'DeleteUser'])->name('delete_user_admin')->middleware(['checksuperadmin']);
});
