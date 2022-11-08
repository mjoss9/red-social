<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\MemberController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\RoomController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\PostLikeController;
use App\Http\Controllers\User\PostReportController;
use App\Http\Controllers\User\CommentLikeController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\WelcomeControler;
use App\Http\Controllers\ResumeDataController;
use App\Http\Controllers\AcademicTitleController;
use App\Http\Controllers\SeminarCourseController;
use App\Http\Controllers\IntellectualProductionController;
use App\Http\Controllers\TeachingExperienceController;
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

Route::middleware(['guest'])->get('/', [WelcomeControler::class, 'show'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('user')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('profile/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');

    Route::get('members', [MemberController::class, 'index'])->name('members.index');

    Route::prefix('comments')->name('comments.')->group(function(){
        Route::post('/{post}/comments', [CommentController::class, 'store'])->name('store');
    });
    
    Route::prefix('posts')->name('posts.')->group(function(){
        Route::post('', [PostController::class, 'store'])->name('store');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('friends')->name('friends.')->group(function(){
        Route::get('', [FriendController::class, 'index'])->name('index');
        Route::post('/{user}', [FriendController::class, 'store'])->name('store');
        Route::patch('/{user}', [FriendController::class, 'update'])->name('update');
        Route::get('/{user}', [FriendController::class, 'deny'])->name('deny');
        Route::delete('/{user}', [FriendController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('post-like')->name('post-like.')->group(function(){
        Route::post('/{post}', [PostLikeController::class, 'store'])->name('store');
        Route::delete('/{post}', [PostLikeController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('comment-like')->name('comment-like.')->group(function(){
        Route::post('/{comment}', [CommentLikeController::class, 'store'])->name('store');
        Route::delete('/{comment}', [CommentLikeController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('notifications')->name('notifications.')->group(function(){
        Route::post('/mark-one/{id}', [NotificationController::class, 'store'])->name('store');
        Route::get('/mark-all', [NotificationController::class, 'update'])->name('update');
        Route::get('/mark-delete/{id}', [NotificationController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('chat/rooms')->name('chat-rooms.')->group(function(){
        Route::get('', [RoomController::class, 'index'])->name('index');
        Route::get('/{room:slug}', [RoomController::class, 'show'])->name('show');
        Route::post('/{room:slug}', [RoomController::class, 'update'])->name('update');
        Route::post('/{room:slug}/messages', [RoomController::class, 'store'])->name('store');
    });
    // Report post
    Route::prefix('post-report')->name('post-report.')->group(function(){
        Route::post('/{post}', [PostReportController::class, 'store'])->name('store');
        Route::delete('/{post}', [PostReportController::class, 'destroy'])->name('destroy');
    });

    // Datos Personales-> ResumeData
    // Titulo Academico -> AcademicTitle
    // Curso y Seminario -> SeminarCourse
    // Poduccion Intelectual-> IntellectualProduction
    // Experiencia Docente -> TeachingExperience

    // -------- Datos Personales-> vista datos personales --------
    Route::get('editresume', [ResumeDataController::class,'show'])->name('resumesdatas.show');
    Route::get('viewresume', [AcademicTitleController::class,'show'])->name('academictitles.show');
    // -------- Datos Personales-> ResumeData --------
    Route::post('resumedata', [ResumeDataController::class, 'store'])->name('resumedatas.store');
    Route::get('resume', [ResumeDataController::class,'index'])->name('resumesdatas.index');
    // -------- Titulo Academico-> AcademicTitle --------
    Route::post('academictitle', [AcademicTitleController::class, 'store'])->name('academictitles.store');
    Route::get('tituloacademico', [AcademicTitleController::class,'index'])->name('academictitles.index');
    // -------- Curso y Seminario-> SeminarCourse --------
    Route::post('curseseminar', [SeminarCourseController::class, 'store'])->name('seminarcourses.store');
    Route::get('cursoseminario', [SeminarCourseController::class,'index'])->name('seminarcourses.index');
    // -------- Poduccion Intelectual-> IntellectualProduction --------
    Route::post('intellectualproduccion', [IntellectualProductionController::class, 'store'])->name('intellectualproductions.store');
    Route::get('produccionintelectual', [IntellectualProductionController::class,'index'])->name('intellectualproductions.index');
    // --------Experiencia Docente-> TeachingExperience --------
    Route::post('teachingexperience', [TeachingExperienceController::class, 'store'])->name('teachingexperiences.store');
    Route::get('experienciadocente', [TeachingExperienceController::class,'index'])->name('teachingexperiences.index');


});

