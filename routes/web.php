<?php

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
    return view('welcome');
});

// User Login
Route::get('/successlogin','UserController@successlogin');
Route::get('/homepage','UserController@homepage');
Route::get('/webdevt-belockr/logout', 'UserController@logout');
Route::get('/webdevt-belockr','UserController@index');
Route::post('/checklogin','UserController@checklogin');

// Student Page
Route::get('/student/', 'UserController@notice');
Route::get('/is_existing/', 'UserController@checkExistingRes')->name('students_check');
Route::get('/wait/', 'LockerController@wait')->name('students_wait');
Route::get('/declined/', 'LockerController@declined')->name('students_decline');
Route::get('/success/', 'LockerController@success')->name('students_success');
Route::get('/receipt/view/{code}', 'TransactionController@load')->name('transactions_load');
Route::post('/receipt/upload/receipt/{code}', 'TransactionController@uploadReceipt')->name('receipt_upload');
Route::get('/waitreceipt/', 'LockerController@waitreceipt')->name('receipt_wait');
Route::get('/student/lockerviewer', 'LockerController@viewallopen')->name('lockerviewer');
Route::get('/student/reserve/locker/{locker_id}', 'LockerController@reserve')->name('lockers_reserve');
Route::post('/students/reserve', 'LockerController@storeReserve')->name('lockers_storeReserve');	
Route::get('/student/reservations', 'LockerController@viewallreserve')->name('students_reservation');

// Staff Page
Route::get('/staff/', 'UserController@staff');
Route::get('/pending/reservations', 'TransactionController@viewallpending')->name('transactions_pending');
Route::get('/confirm/receipts', 'TransactionController@viewallconfirm')->name('transactions_receipts');
Route::get('/pending/reservations/approve/{code}', 'TransactionController@approverev')->name('transactions_approve');
Route::get('/pending/reservations/decline/{code}', 'TransactionController@declinerev')->name('transactions_decline');
Route::get('/pending/receipts/confirm/{code}', 'TransactionController@confirmrec')->name('transactions_confirm');
Route::get('/pending/receipts/reject/{code}', 'TransactionController@rejectrec')->name('transactions_reject');


// Admin Page
Route::get('/admin/', 'UserController@admin');

// Transactions CRUD
Route::get('/transactions/index', 'TransactionController@index')->name('transactions_list');
Route::get('/transactions/create', 'TransactionController@create')->name('transactions_add');
Route::post('/transactions/store', 'TransactionController@store')->name('transactions_store');	
Route::get('/transactions/edit/{code}', 'TransactionController@edit')->name('transactions_edit');
Route::post('/transactions/edit/{code}', 'TransactionController@update')->name('transactions_update');
Route::delete('/transactions/delete/{code}', 'TransactionController@delete')->name('transactions_delete');

// Students CRUD
Route::get('/students/index','StudentController@index')->name('students_list');
Route::get('/students/create','StudentController@create')->name('students_add');
Route::post('/students/store', 'StudentController@store')->name('students_store');	
Route::get('/students/edit/{student_code}','StudentController@edit')->name('students_edit');
Route::post('/students/edit/{student_code}','StudentController@update')->name('students_update');
Route::delete('/students/delete/{student_code}', 'StudentController@delete')->name('students_delete');

// Lockers CRUD
Route::get('/lockers/index', 'LockerController@index')->name('lockers_list');
Route::get('/lockers/create', 'LockerController@create')->name('lockers_add');
Route::post('/lockers/create', 'LockerController@store')->name('lockers_store');	
Route::get('/lockers/edit/{code}', 'LockerController@edit')->name('lockers_edit');	
Route::post('/lockers/edit/{code}', 'LockerController@update')->name('lockers_update');	
Route::get('/lockers/delete/{code}', 'LockerController@delete')->name('lockers_delete');

// Staffs CRUD
Route::get('/staffs/index','StaffController@index')->name('staffs_list');
Route::get('/staffs/create','StaffController@create')->name('staffs_add');
Route::post('/staffs/create','StaffController@store')->name('staffs_store');	
Route::get('/staffs/edit/{staff_code}','StaffController@edit')->name('staffs_edit');	
Route::post('/staffs/edit/{staff_code}','StaffController@update')->name('staffs_update');	
Route::get('/staffs/delete/{staff_code}','StaffController@delete')->name('staffs_delete');