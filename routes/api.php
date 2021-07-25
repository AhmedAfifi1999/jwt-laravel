<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserConrotller;
use App\Http\Controllers\Api\CourseConrotller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("register", [UserConrotller::class, "register"]);
Route::post('login', [UserConrotller::class, "login"]);

Route::group(["middleware" => ["auth:api"]], function () {
    Route::get("profile", [UserConrotller::class, "profile"]);
    Route::get("logout", [UserConrotller::class, "logout"]);
//Course
    Route::get("total-courses", [CourseConrotller::class, "totalCourses"]);
    Route::post("course-enrol", [CourseConrotller::class, "courseEnrollment"]);
    Route::get("delete-course/{id}", [CourseConrotller::class, "deleteCourse"]);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
