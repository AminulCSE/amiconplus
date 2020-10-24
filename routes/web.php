<?php
use Illuminate\Support\Facades\Route;

// Employee
Route::get('add_employee', 'EmployeeController@create');
Route::post('store_employee', 'EmployeeController@store');
Route::get('all_employee', 'EmployeeController@index');
Route::get('edit_employee/{id}', 'EmployeeController@edit');
Route::post('update_employee/{id}', 'EmployeeController@update');
Route::get('delete_employee/{id}', 'EmployeeController@delete');

// Employee Attendance
Route::get('add_attendacne_employee', 'EmployeeController@create_attendance');
Route::post('store_attendance_employee', 'EmployeeController@att_store');
Route::get('all_attendance_employee', 'EmployeeController@all_attendance_employee');
Route::get('edit_attendance_employee/{edit_date}', 'EmployeeController@edit_attendance_employee');
Route::post('update_attendance_employee', 'EmployeeController@update_attendance');

// Attendance report emply
Route::get('attendance/{id}', 'EmployeeController@attendance_report_emply');
Route::get('monthly_attendance_report_employee', 'EmployeeController@monthly_attendance_report_employee');


// Orders
Route::get('/all_order', 'OrderController@index');
Route::get('/add_order', 'OrderController@create');
Route::post('/store_order', 'OrderController@store');
Route::get('/edit_order/{id}', 'OrderController@edit');
Route::post('/update_order/{id}', 'OrderController@update');

Route::get('/pending_order', 'OrderController@pending_order');

// Customer
Route::get('/all_customer', 'CustomerController@index');
Route::get('/add_customer', 'CustomerController@create');
Route::post('/store_customer', 'CustomerController@store');
Route::get('/edit_customer/{id}', 'CustomerController@edit');
Route::post('/update_customer/{id}', 'CustomerController@update');
Route::get('/delete_customer/{id}', 'CustomerController@destroy');


// Auth route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@home')->name('home');


