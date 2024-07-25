<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//-------------------------- Grouping Route ---------------------------
// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {

//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group(['middleware' => ['auth']], function () {

//         Route::post('', [IdeaController::class, 'store'])->name('store');

//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

//         Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

//         Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

//     });
// });

Route::resource('ideas', IdeaController::class)->except(['index','create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show','edit','update'])->middleware('auth');

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
});
