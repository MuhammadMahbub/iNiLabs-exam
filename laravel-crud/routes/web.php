<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EmployeeController::class, 'index'])->name('index');

Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/delete_all', [EmployeeController::class, 'multipleDelete'])->name('employee.delete_all');


Route::post('/send_mail', [EmployeeController::class, 'send_mail'])->name('employee.send_mail');


