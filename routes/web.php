<?php

use App\Http\Controllers\HomeConrtroller;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VotingRecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserBlockController;
use App\Http\Controllers\BlacklistedController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('Home', [HomeConrtroller::class,'index'])->name('Home');

Route::get('Forum/{forumName}', [ForumController::class,'show'])->name('Forum');

Route::get('Article/{articleName}', [ArticleController::class,'show'])->name('Article');


Route::middleware('auth')->group(function(){
    Route::get('ReportCreate',[ReportController::class,'create'])->name('Report.create');
    Route::post('Report',[ReportController::class,'store'])->name('Report.store');
    Route::get('ReportShow',[ReportController::class,'show'])->name('Report.show');
    Route::delete('Report',[ReportController::class,'destroy'])->name('Report.destroy');
});

Route::middleware('auth')->group(function(){
    Route::patch('Userblock',[UserBlockController::class,'block'])->name('UserBlock.block');
    Route::get('Block',[BlacklistedController::class,'store'])->name('Blacklisted.store');
    Route::get('BlocklistShow',[BlacklistedController::class,'show'])->name('Blacklisted.show');
    Route::delete('Blocklist', [BlacklistedController::class,'destroy'])->name('Blacklisted.destroy');
    Route::get('UserUnblock',[UserBlockController::class,'Unblock'])->name('UserBlock.Unblock');
});

Route::middleware('auth')->group(function(){
    Route::get('ForumCreate',[ForumController::class,'create'])->name('Forum.create');
    Route::post('Forum',[ForumController::class,'store'])->name('Forum.store');
    Route::delete('Forum', [ForumController::class,'destroy'])->name('Forum.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('ArticleCreate/{fourmID}', [ArticleController::class,'create'])->name('Article.create');
    Route::get('ArticleEdit/{articleName}',[ArticleController::class,'edit'])->name('Article.edit');
    Route::post('Article', [ArticleController::class,'store'])->name('Article.store');
    Route::patch('Article', [ArticleController::class,'update'])->name('Article.update');
    Route::delete('Article', [ArticleController::class,'destroy'])->name('Article.destroy');
});

Route::middleware('auth')->group(function(){
    Route::post('Comment', [CommentsController::class,'store'])->name('Comment.store');
    Route::post('CommentEdit', [CommentsController::class,'edit'])->name('Comment.edit');
    Route::patch('Comment', [CommentsController::class,'update'])->name('Comment.update');
    Route::delete('Comment', [CommentsController::class,'destroy'])->name('Comment.destroy');
});

Route::middleware('auth')->group(function(){
    Route::post('VoteCreate',[VoteController::class,'create'])->name('Vote.create');
    Route::post('Vote',[VoteController::class,'store'])->name('Vote.store');
    Route::post('VotelistShow',[VoteController::class,'show'])->name('Vote.show');
    Route::patch('Vote',[VoteController::class,'update'])->name('Vote.update');
});

Route::middleware('auth')->group(function(){
    Route::get('VotingRecord/{VoteID}',[VotingRecordController::class,'store'])->name('VotingRecord.store');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
