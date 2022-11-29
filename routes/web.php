<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
//Auth::routes();
Route::get('/', 'HomeController@index')->name('selection');


Route::group(['namespace' => 'Auth'], function () {

Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

Route::post('/login','LoginController@login')->name('login');

Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
	],
	function () {
		Route::group(['namespace' => 'Grades'], function () {
			Route::resource('Grades', 'GradeController');
		});

		Route::group(['namespace' => 'Classrooms'], function () {
			Route::resource('Classrooms', 'ClassroomController');
			Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
			Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
		});

		Route::group(['namespace' => 'Sections'], function () {
			Route::resource('Sections', 'SectionsController');
			Route::get('/classes/{id}', 'SectionsController@getclasses');
		});

		Route::group(['namespace' => 'Teachers'], function () {
			Route::resource('Teachers', 'TeacherController');
		});

		Route::group(['namespace' => 'Students'], function () {

			//Promotion
			Route::resource('Promotion', 'PromotionController');

			//Gradeauted
			Route::resource('Gradeauted', 'GraduatedController');

			//Fees
			Route::resource('Fee', 'FeeController');

			//Fees Invoices
			Route::resource('Fees_Invoices', 'FeeInvoiceController');

			//receipt students
			Route::resource('receipt_students', 'ReceiptStudentController');

			// Processing Fee
			Route::resource('ProcessingFee', 'ProcessingFeeController');

			Route::resource('Payment_students', 'PaymentStudentController');
			Route::resource('Attendance', 'AttendanceController');
			//Students
			Route::resource('Students', 'StudentsController');
			Route::post('Upload_attachment', 'StudentsController@Upload_attachment')->name('Upload_attachment');
			Route::post('Delete_attachment', 'StudentsController@Delete_attachment')->name('Delete_attachment');
			Route::get('/Download_attachment/{name}/{file}', 'StudentsController@Download_attachment');
		});

		Route::group(['namespace' => 'Subject'], function () {
			Route::resource('Subject', 'SubjectController');
			Route::resource('Quizze', 'QuizzeController');
			Route::resource('questions', 'QuestionController');
			Route::resource('library', 'LibraryController');
			Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
		});

		Route::group(['namespace' => 'Settings'], function () {
			Route::resource('settings', 'SettingController');
		});

		Route::view('add_parent', 'livewire.show_form')->name('add_parent');

		Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

	

		}
);

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth:teacher,web']
	],
	function () {
		Route::group(['namespace' => 'Students'], function () {
			Route::get('/Get_classrooms/{id}', 'StudentsController@Get_classrooms');
			Route::get('/Get_Sections/{id}', 'StudentsController@Get_Sections');
            //online classes
			Route::resource('online_classes', 'OnlineClasseController');
			Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
			Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');
			
		});
	});
