<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IncomeCategory;
use App\Models\Income;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use Carbon\Carbon;

class ManageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function manage(){
        $user=User::where('status','1')->count();
        $incomeCategory=IncomeCategory::where('incate_status','1')->count();
        $income=Income::where('income_status','1')->count();
        $expenseCategory=ExpenseCategory::where('expcate_status','1')->count();
        $expense=Expense::where('expense_status','1')->count();
        return view('admin.manage.manage',compact('user','incomeCategory','income','expenseCategory','expense'));
    }
















    
}
