<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IncomeCategory;
use App\Models\Income;
use App\Models\ExpenseCategory;
use App\Models\Expense;

class RecycleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.recycle.index');
    }

    public function user(){
        $all = User::where('status',0)->get();
        return view('admin.recycle.user',compact('all'));
    }

    public function incomeCategory(){
        $all = IncomeCategory::where('incate_status',0)->orderBy('incate_id','DESC')->get();
        return view('admin.recycle.income-category',compact('all'));
    }

    public function income(){
        $all = Income::where('income_status',0)->orderBy('income_id','DESC')->get();
        return view('admin.recycle.income',compact('all'));
    }

    public function expenseCategory(){
        $all = ExpenseCategory::where('expcate_status',0)->orderBy('expcate_id','DESC')->get();
        return view('admin.recycle.expense-category',compact('all'));
    }

    public function expense(){
        $all = Expense::where('expense_status',0)->orderBy('expense_id','DESC')->get();
        return view('admin.recycle.expense',compact('all'));
    }
}
