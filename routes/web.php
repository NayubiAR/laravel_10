<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\FeedController;
=======
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD

//-------------------------- Grouping Route ---------------------------
// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {
    
//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group(['middleware' => ['auth']], function () {
    
=======
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//-------------------------- Grouping Route ---------------------------
// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {

//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group(['middleware' => ['auth']], function () {

>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
//         Route::post('', [IdeaController::class, 'store'])->name('store');

//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

//         Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

//         Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

//     });
// });
<<<<<<< HEAD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
=======
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');
<<<<<<< HEAD

//Untuk route feed tidak perlu men define method nya karena laravel akan langsung mencarikan __invoke nya
Route::get('/feed',  FeedController::class)->middleware('auth')->name('feed');
=======
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
// ------------------------------------------------- Resources Routing ----------------------------------------------------

// Menggunakan resources routing yang dimana langsung membuat kan 7 method dari laravel berikut yang dibuat oleh resources:
// VERB         | URL              |    Action    | Route Name
// GET	        /photos	                index	    photos.index
// GET	        /photos/create	        create	    photos.create
// POST	        /photos	                store	    photos.store
// GET	        /photos/{photo}	        show	    photos.show
// GET	        /photos/{photo}/edit	edit	    photos.edit
// PUT/PATCH	/photos/{photo}	        update	    photos.update
// DELETE	    /photos/{photo}	        destroy	    photos.destroy

Route::get('/terms', function () {
    return view('terms');
})->name('terms');