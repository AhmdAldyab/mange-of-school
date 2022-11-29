<?php

use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        $ids=DB::table('teacher_sections')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
        $count_section=$ids->count();
        $count_student=Students::whereIn('section_id',$ids)->count();
        return view('pages.Teachers.dashboard',compact('count_section','count_student'));
    });

    Route::group(['namespace'=>'Teachers'],function(){
        Route::get('student','studentController@index')->name('student');
        Route::get('sections','studentController@sections')->name('sections');
        Route::post('attendance.edit','studentController@editAttendance')->name('attendance.edit');
        Route::post('attendance','studentController@attendance')->name('attendance');
        Route::get('attendanceReport','studentController@attendanceReport')->name('attendanceReport');
        Route::post('attandanceSerach','studentController@attandanceSerach')->name('attandance.Serach');
        Route::resource('quizzes','QuizzController');
        Route::get('quizzes.students\{id}','QuizzController@student_exam')->name('quizzes.student_exam');
        Route::post('repeat.quizze\{id}','QuizzController@repeat_quizze')->name('repeat.quizze');
        Route::resource('questions','QusetionController');

        Route::get('profil','ProfilController@index')->name('Teacher.profil');
        Route::post('profile/{id}', 'ProfilController@update')->name('profile.update');
    
    });

});