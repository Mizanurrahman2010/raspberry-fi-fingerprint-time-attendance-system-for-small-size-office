<?php

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

Route::get('login/status', 'LoginStatusController@index');
Route::post('login/status', 'LoginStatusController@index');
Route::get('connection/status', 'LoginStatusController@index');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function () {

    //Route::get('foo', 'Photos\AdminController@method');

    Route::get('', 'Admin\AdminController@index');// Matches The "/Admin/users" URL

    Route::get('staffs', 'Admin\Staffs\DashboardController@dashboard');
    Route::get('staffs/registration', 'Admin\Staffs\RegistrationController@registrationForm');
    Route::post('staffs/registration', 'Admin\Staffs\RegistrationController@registration');
    Route::get('staffs/list', 'Admin\Staffs\ListController@staffslist');
    Route::get('staffs/profile/{id}/update', 'Admin\Staffs\UpdateController@updateForm');
    Route::post('staffs/profile/{id}/update', 'Admin\Staffs\UpdateController@update');
    Route::post('staffs/profile/{id}/update/rule', 'Admin\Staffs\UpdateController@rule');
    Route::get('staffs/profile/{id}/view', 'Admin\Staffs\ViewController@view');

    Route::post('staffs/profile/{id}/update/fpsdirectscan', 'Admin\Staffs\FPSController@TakeFingerPrint');
    Route::post('staffs/profile/{id}/update/fpsscanstop', 'Admin\Staffs\FPSController@ScanStop');
    Route::post('staffs/profile/{id}/update/fpsscanstart', 'Admin\Staffs\FPSController@ScanStart');
    Route::post('staffs/profile/{id}/update/fpsmanualupdate', 'Admin\Staffs\FPSController@ManualUpdate');

    Route::get('staffs/designations/create', 'Admin\Staffs\Designations\CreateController@createForm');
    Route::post('staffs/designations/create', 'Admin\Staffs\Designations\CreateController@create');
    Route::get('staffs/designations/list', 'Admin\Staffs\Designations\ListController@listView');
    Route::get('staffs/designations/{id}/update', 'Admin\Staffs\Designations\UpdateController@updateForm');
    Route::post('staffs/designations/{id}/update', 'Admin\Staffs\Designations\UpdateController@update');
    Route::post('staffs/designations/{id}/delete', 'Admin\Staffs\Designations\DeleteController@delete');
    Route::get('staffs/designations/{id}/view', 'Admin\Staffs\Designations\ViewController@view');

    Route::get('staffs/status/create', 'Admin\Staffs\Status\CreateController@createForm');
    Route::post('staffs/status/create', 'Admin\Staffs\Status\CreateController@create');
    Route::get('staffs/status/list', 'Admin\Staffs\Status\ListController@listView');
    Route::get('staffs/status/{id}/update', 'Admin\Staffs\Status\UpdateController@updateForm');
    Route::post('staffs/status/{id}/update', 'Admin\Staffs\Status\UpdateController@update');
    Route::post('staffs/status/{id}/delete', 'Admin\Staffs\Status\DeleteController@delete');
    Route::get('staffs/status/{id}/view', 'Admin\Staffs\Status\ViewController@view');

    Route::get('attendance', 'Admin\Attendance\DashboardController@dashboard');

    Route::get('attendance/rule/staff/create', 'Admin\Attendance\Rule\Staff\CreateController@createForm');
    Route::post('attendance/rule/staff/create', 'Admin\Attendance\Rule\Staff\CreateController@create');
    Route::get('attendance/rule/staff/list', 'Admin\Attendance\Rule\Staff\ListController@listView');
    Route::get('attendance/rule/staff/{id}/view', 'Admin\Attendance\Rule\Staff\ViewController@view');
    Route::get('attendance/rule/staff/{id}/update', 'Admin\Attendance\Rule\Staff\UpdateController@updateForm');
    Route::post('attendance/rule/staff/{id}/update', 'Admin\Attendance\Rule\Staff\UpdateController@update');

    Route::get('attendance/specialgroup/create', 'Admin\Attendance\Specialgroup\CreateController@createForm');
    Route::post('attendance/specialgroup/create', 'Admin\Attendance\Specialgroup\CreateController@create');
    Route::get('attendance/specialgroup/list', 'Admin\Attendance\Specialgroup\ListController@listView');
    Route::get('attendance/specialgroup/{id}/update', 'Admin\Attendance\Specialgroup\UpdateController@updateForm');
    Route::post('attendance/specialgroup/{id}/update', 'Admin\Attendance\Specialgroup\UpdateController@update');
    Route::post('attendance/specialgroup/{id}/delete', 'Admin\Attendance\Specialgroup\DeleteController@delete');
    Route::post('attendance/specialgroup/{id}/staffs/search', 'Admin\Attendance\Specialgroup\StaffsController@search');

    Route::get('departments', 'Admin\Departments\DashboardController@dashboard');
    Route::get('departments/create', 'Admin\Departments\CreateController@createForm');
    Route::post('departments/create', 'Admin\Departments\CreateController@create');
    Route::get('departments/list', 'Admin\Departments\ListController@listView');
    Route::get('departments/{id}/update', 'Admin\Departments\UpdateController@updateForm');
    Route::post('departments/{id}/update', 'Admin\Departments\UpdateController@update');
    Route::get('departments/{id}/view', 'Admin\Departments\ViewController@view');
    Route::post('departments/{id}/delete', 'Admin\Departments\DeleteController@delete');

    Route::get('report/attendance', 'Admin\Report\Attendance\DashboardController@dashboard');
    Route::get('report/attendance/daily', 'Admin\Report\Attendance\DailyController@daily');
    // Route::get('report/attendance/daterange', 'Admin\Report\Attendance\daterangeController@daterange');
    Route::get('report/attendance/person', 'Admin\Report\Attendance\PersonController@personView');
    Route::post('report/attendance/person', 'Admin\Report\Attendance\PersonController@person');
    // Route::get('report/attendance/persons', 'Admin\Report\Attendance\PersonsController@persons');


    Route::post('staffs/search', 'Admin\Staffs\RegistrationController@search');
    Route::post('staffs/update', 'Admin\Staffs\RegistrationController@update');
    Route::post('staffs/update/photo', 'Admin\Staffs\RegistrationController@updatePhoto');
    Route::post('staffs/academic/insert', 'Admin\Staffs\RegistrationController@AcademicInsert');
    Route::post('staffs/current_semester/insert', 'Admin\Staffs\RegistrationController@CurrentSemesterInsert');

    Route::post('FPS_ScanningStatus', 'Admin\FPS_Controller@ScanningStatus');

    Route::post('FPS_ScanningStatusClear', 'Admin\FPS_Controller@ScanningStatusClear');

    //Route::get('staffs/profile/{id}/view',   'Admin\Staffs\StaffsController@view');
    //Route::get('staffs/profile/{id}/update', 'Admin\Staffs\StaffsController@update');
    //Route::get('staffs/profile/{id}/delete', 'Admin\Staffs\StaffsController@delete');
    //Route::get('staffs/profiles/delete', 'Admin\Staffs\StaffsController@deletes');
});


Route::prefix('student')->group(function(){

    Route::get('', 'Student\StudentController@index');
    Route::post('profile/link/get', 'Student\StudentController@GetProfileLink');
    Route::post('get/ByFPS', 'Student\StudentController@GetStudentByFPS');
    Route::get('{id}/profile', 'Student\StudentController@profile')->name('profile');

});
