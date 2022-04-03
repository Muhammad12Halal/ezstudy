<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCourseContentController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminCourseEnrollController;
use App\Http\Controllers\Admin\AdminCourseRatingController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminLectureController;
use App\Http\Controllers\Admin\AdminLevelController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\InstructorCourseContentController;
use App\Http\Controllers\Instructor\InstructorCourseController;
use App\Http\Controllers\Instructor\InstructorLectureController;
use App\Http\Controllers\Instructor\InstructorProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User
Route::group(['as' => 'e.'], function () {
    Route::get('/main', [FrontController::class, 'index'])->name('index');
    Route::get('/course', [FrontController::class, 'course'])->name('course');
    Route::get('/course/{id}', [FrontController::class, 'courseDetail'])->name('courseDetail');
    Route::get('/eventDetails', [FrontController::class, 'event'])->name('event');
});


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'Admin'], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
    });

    // User Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('index');
        Route::get('/create', [AdminProfileController::class, 'create'])->name('create');
        Route::post('/store', [AdminProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminProfileController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminProfileController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminProfileController::class, 'destroy'])->name('destroy');
    });

    // Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('destroy');
    });

    // Level
    Route::group(['prefix' => 'level', 'as' => 'level.'], function () {
        Route::get('/', [AdminLevelController::class, 'index'])->name('index');
        Route::get('/create', [AdminLevelController::class, 'create'])->name('create');
        Route::post('/store', [AdminLevelController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminLevelController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminLevelController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminLevelController::class, 'destroy'])->name('destroy');
    });

    // Course
    Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
        Route::get('/', [AdminCourseController::class, 'index'])->name('index');
        Route::get('/create', [AdminCourseController::class, 'create'])->name('create');
        Route::post('/store', [AdminCourseController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCourseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminCourseController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCourseController::class, 'destroy'])->name('destroy');
    });

    // Course Rating
    Route::group(['prefix' => 'rating', 'as' => 'rating.'], function () {
        Route::get('/', [AdminCourseRatingController::class, 'index'])->name('index');
        Route::get('/create', [AdminCourseRatingController::class, 'create'])->name('create');
        Route::post('/store', [AdminCourseRatingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCourseRatingController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminCourseRatingController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCourseRatingController::class, 'destroy'])->name('destroy');
    });

    // Course Content
    Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
        Route::get('/', [AdminCourseContentController::class, 'index'])->name('index');
        Route::get('/create', [AdminCourseContentController::class, 'create'])->name('create');
        Route::post('/store', [AdminCourseContentController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCourseContentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminCourseContentController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCourseContentController::class, 'destroy'])->name('destroy');
    });

    // Content Lecture
    Route::group(['prefix' => 'lecture', 'as' => 'lecture.'], function () {
        Route::get('/', [AdminLectureController::class, 'index'])->name('index');
        Route::get('/create', [AdminLectureController::class, 'create'])->name('create');
        Route::post('/store', [AdminLectureController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminLectureController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminLectureController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminLectureController::class, 'destroy'])->name('destroy');
    });

    // Content Lecture
    Route::group(['prefix' => 'enroll', 'as' => 'enroll.'], function () {
        Route::get('/', [AdminCourseEnrollController::class, 'index'])->name('index');
        Route::get('/create', [AdminCourseEnrollController::class, 'create'])->name('create');
        Route::post('/store', [AdminCourseEnrollController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCourseEnrollController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminCourseEnrollController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCourseEnrollController::class, 'destroy'])->name('destroy');
    });

    // Event
    Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
        Route::get('/', [AdminEventController::class, 'index'])->name('index');
        Route::get('/create', [AdminEventController::class, 'create'])->name('create');
        Route::post('/store', [AdminEventController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminEventController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminEventController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminEventController::class, 'destroy'])->name('destroy');
    });

});

// Instructor
Route::group(['prefix' => 'instructor', 'as' => 'instructor.', 'middleware' => 'Instructor'], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [InstructorController::class, 'index'])->name('index');
        Route::get('/profile', [InstructorController::class, 'profile'])->name('profile');
    });

    // User Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [InstructorProfileController::class, 'index'])->name('index');
        Route::get('/create', [InstructorProfileController::class, 'create'])->name('create');
        Route::post('/store', [InstructorProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [InstructorProfileController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [InstructorProfileController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [InstructorProfileController::class, 'destroy'])->name('destroy');
    });

    // Course
    Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
        Route::get('/', [InstructorCourseController::class, 'index'])->name('index');
        Route::get('/create', [InstructorCourseController::class, 'create'])->name('create');
        Route::post('/store', [InstructorCourseController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [InstructorCourseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [InstructorCourseController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [InstructorCourseController::class, 'destroy'])->name('destroy');
    });

    // Course Content
    Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
        Route::get('{item}/', [InstructorCourseContentController::class, 'index'])->name('index');
        Route::get('{item}/create', [InstructorCourseContentController::class, 'create'])->name('create');
        Route::post('{item}/store', [InstructorCourseContentController::class, 'store'])->name('store');
        Route::get('{item}/edit/{id}', [InstructorCourseContentController::class, 'edit'])->name('edit');
        Route::post('{item}/update/{id}', [InstructorCourseContentController::class, 'update'])->name('update');
        Route::get('{item}/delete/{id}', [InstructorCourseContentController::class, 'destroy'])->name('destroy');
    });

    // Content Lecture
    Route::group(['prefix' => 'lecture', 'as' => 'lecture.'], function () {
        Route::get('{id}/', [InstructorLectureController::class, 'index'])->name('index');
        Route::get('{item}/{data}/create', [InstructorLectureController::class, 'create'])->name('create');
        Route::post('{id}/store', [InstructorLectureController::class, 'store'])->name('store');
        Route::get('{id}/edit/{new}', [InstructorLectureController::class, 'edit'])->name('edit');
        Route::post('{id}/update/{new}', [InstructorLectureController::class, 'update'])->name('update');
        Route::get('{id}/delete/{new}', [InstructorLectureController::class, 'destroy'])->name('destroy');
    });

});

// Instructor
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'User'], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    });

        // User Profile
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', [UserProfileController::class, 'index'])->name('index');
            Route::get('/create', [UserProfileController::class, 'create'])->name('create');
            Route::post('/store', [UserProfileController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserProfileController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UserProfileController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [UserProfileController::class, 'destroy'])->name('destroy');
        });

});
