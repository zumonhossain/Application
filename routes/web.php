<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\BasicController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Application Routes Start

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/dashboard/pdf', [AdminController::class, 'pdf']);
Route::get('admin/dashboard/excel', [AdminController::class, 'excel']);


Route::get('admin/general/basic', [BasicController::class, 'basic']);
Route::post('admin/general/basic/update', [BasicController::class, 'update_basic']);

Route::get('admin/user', [UserController::class, 'index']);
Route::get('admin/user/add', [UserController::class, 'add']);
Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
Route::get('admin/user/view/{id}', [UserController::class, 'view']);
Route::post('admin/user/submit', [UserController::class, 'insert']);
Route::post('admin/user/update/', [UserController::class, 'update']);
Route::post('admin/user/softdelete', [UserController::class, 'softdelete']);
Route::post('admin/user/restore', [UserController::class, 'restore']);
Route::post('admin/user/delete', [UserController::class, 'delete']);
Route::get('admin/user/pdf', [UserController::class, 'pdf']);
Route::get('admin/user/excel', [UserController::class, 'excel']);

Route::get('admin/income/category/', [IncomeCategoryController::class, 'index']);
Route::get('admin/income/category/add', [IncomeCategoryController::class, 'add']);
Route::get('admin/income/category/edit/{slug}', [IncomeCategoryController::class, 'edit']);
Route::get('admin/income/category/view/{slug}', [IncomeCategoryController::class, 'view']);
Route::post('admin/income/category/submit', [IncomeCategoryController::class, 'insert']);
Route::post('admin/income/category/update', [IncomeCategoryController::class, 'update']);
Route::post('admin/income/category/softdelete', [IncomeCategoryController::class, 'softdelete']);
Route::post('admin/income/category/restore', [IncomeCategoryController::class, 'restore']);
Route::post('admin/income/category/delete', [IncomeCategoryController::class, 'delete']);
Route::get('admin/income/category/pdf', [IncomeCategoryController::class, 'pdf']);
Route::get('admin/income/category/excel', [IncomeCategoryController::class, 'excel']);

Route::get('admin/income', [IncomeController::class, 'index']);
Route::get('admin/income/add', [IncomeController::class, 'add']);
Route::get('admin/income/edit/{slug}', [IncomeController::class, 'edit']);
Route::get('admin/income/view/{slug}', [IncomeController::class, 'view']);
Route::post('admin/income/submit', [IncomeController::class, 'insert']);
Route::post('admin/income/update', [IncomeController::class, 'update']);

Route::post('admin/income/softdelete', [IncomeController::class, 'softdelete']);

Route::post('admin/income/restore', [IncomeController::class, 'restore']);
Route::post('admin/income/delete', [IncomeController::class, 'delete']);
Route::get('admin/income/pdf', [IncomeController::class, 'pdf']);
Route::get('admin/income/excel', [IncomeController::class, 'excel']);

Route::get('admin/expense/category', [ExpenseCategoryController::class, 'index']);
Route::get('admin/expense/category/add', [ExpenseCategoryController::class, 'add']);
Route::get('admin/expense/category/edit/{slug}', [ExpenseCategoryController::class, 'edit']);
Route::get('admin/expense/category/view/{slug}', [ExpenseCategoryController::class, 'view']);
Route::post('admin/expense/category/submit', [ExpenseCategoryController::class, 'insert']);
Route::post('admin/expense/category/update', [ExpenseCategoryController::class, 'update']);
Route::post('admin/expense/category/softdelete', [ExpenseCategoryController::class, 'softdelete']);
Route::post('admin/expense/category/restore', [ExpenseCategoryController::class, 'restore']);
Route::post('admin/expense/category/delete', [ExpenseCategoryController::class, 'delete']);
Route::get('admin/expense/category/pdf', [ExpenseCategoryController::class, 'pdf']);
Route::get('admin/expense/category/excel', [ExpenseCategoryController::class, 'excel']);

Route::get('admin/expense', [ExpenseController::class, 'index']);
Route::get('admin/expense/add', [ExpenseController::class, 'add']);
Route::get('admin/expense/edit/{slug}', [ExpenseController::class, 'edit']);
Route::get('admin/expense/view/{slug}', [ExpenseController::class, 'view']);
Route::post('admin/expense/submit', [ExpenseController::class, 'insert']);
Route::post('admin/expense/update', [ExpenseController::class, 'update']);
Route::post('admin/expense/softdelete', [ExpenseController::class, 'softdelete']);
Route::post('admin/expense/restore', [ExpenseController::class, 'restore']);
Route::post('admin/expense/delete', [ExpenseController::class, 'delete']);
Route::get('admin/expense/pdf', [ExpenseController::class, 'pdf']);
Route::get('admin/expense/excel', [ExpenseController::class, 'excel']);

Route::get('admin/summary', [SummaryController::class, 'index']);
Route::get('admin/summary/search/{from}/{to}',[SummaryController::class,'search']);
Route::get('admin/summary/excel',[SummaryController::class,'excel']);
Route::get('admin/summary/pdf',[SummaryController::class,'pdf']);

Route::get('admin/manage', [ManageController::class, 'manage']);

Route::get('admin/recycle', [RecycleController::class, 'index']);
Route::get('admin/recycle/user', [RecycleController::class, 'user']);
Route::get('admin/recycle/income/category', [RecycleController::class, 'incomeCategory']);
Route::get('admin/recycle/income', [RecycleController::class, 'income']);
Route::get('admin/recycle/expense/category', [RecycleController::class, 'expenseCategory']);
Route::get('admin/recycle/expense', [RecycleController::class, 'expense']);












require __DIR__.'/auth.php';
