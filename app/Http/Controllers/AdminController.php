<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AdminExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\User;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use PDF;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $to = Carbon::now()->format('Y-m-d');
        $from = date('Y-m-d', strtotime('-7 days', strtotime($to)));
        $last_7days_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->get();
        $last_7days_all_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->sum('income_amount');
        $last_7days_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->get();
        $last_7days_all_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->sum('expense_amount');

        $month= Carbon::now()->format('m');
        $year= Carbon::now()->format('Y');
        $totalIncome =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->sum('income_amount');
        $totalExpense =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->sum('expense_amount');
        $user=User::where('status','1')->count();
        
        return view('admin.dashboard.home', compact('to','from','last_7days_income','last_7days_all_income','last_7days_expense','last_7days_all_expense','month','year','totalIncome','totalExpense','user'));
        
    }

    public function pdf(){
        $to = Carbon::now()->format('Y-m-d');
        $from = date('Y-m-d', strtotime('-7 days', strtotime($to)));
        $last_7days_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->get();
        $last_7days_all_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->sum('income_amount');
        $last_7days_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->get();
        $last_7days_all_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->sum('expense_amount');
        $totalIncome=Income::where('income_status',1)->sum('income_amount');
        $totalExpense=Expense::where('expense_status',1)->sum('expense_amount');

        $pdf = PDF::loadView('admin.dashboard.pdf', compact('to','from','last_7days_income','last_7days_all_income','last_7days_expense','last_7days_all_expense','totalIncome','totalExpense'));
        return $pdf->download('Last7Days.pdf');
    }

    public function excel(){
        return Excel::download(new AdminExport, 'Last7Days.xlsx');
    }

   
}
