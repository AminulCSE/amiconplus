<?php
use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@home')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Employee
Route::get('add_employee', 'EmployeeController@create');
Route::post('store_employee', 'EmployeeController@store');
Route::get('all_employee', 'EmployeeController@index');
Route::get('edit_employee/{id}', 'EmployeeController@edit');
Route::post('update_employee/{id}', 'EmployeeController@update');
Route::get('delete_employee/{id}', 'EmployeeController@delete');

// Employee Attendance
Route::get('add_attendacne_employee', 'EmployeeController@attendance');
Route::post('store_employee_attendance', 'EmployeeController@att_store');
Route::get('all_attendance', 'EmployeeController@all_attendance');
Route::get('edit_attendance/{edit_date}', 'EmployeeController@edit_date');
Route::post('update_employee_attendance', 'EmployeeController@update_attendance');