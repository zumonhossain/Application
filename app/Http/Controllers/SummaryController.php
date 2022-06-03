<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SummaryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;
use PDF;

class SummaryController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $month= Carbon::now()->format('m');
        $fullMonth= Carbon::now()->format('F');
        $year= Carbon::now()->format('Y');
        $incomes =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->get();
        $incomeTotal =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->sum('income_amount');
        $expense =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->get();
        $expenseTotal =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->sum('expense_amount');
        return view('admin.summary.all', compact('month','fullMonth','year','incomes','incomeTotal','expense','expenseTotal'));
    }

    

    public function search($from,$to){
      
       $income = Income::whereBetween('income_date', [$from, $to])->get();
       $expense = Expense::whereBetween('expense_date', [$from, $to])->get();
       $incomeTotal =  Income::whereBetween('income_date', [$from, $to])->sum('income_amount');
       $expenseTotal =  Expense::whereBetween('expense_date', [$from, $to])->sum('expense_amount');
       return view('admin.summary.search', compact('from','to','income','expense','incomeTotal','expenseTotal'));
    }

    public function pdf(){
        $month= Carbon::now()->format('m');
        $fullMonth= Carbon::now()->format('F');
        $year= Carbon::now()->format('Y');
        $incomes =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->get();
        $incomeTotal =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->sum('income_amount');
        $expense =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->get();
        $expenseTotal =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->sum('expense_amount');

        $pdf = PDF::loadView('admin.summary.pdf', compact('month','fullMonth','year','incomes','incomeTotal','expense','expenseTotal'));
        return $pdf->download('summary.pdf');
    }

    public function excel(){
        return Excel::download(new SummaryExport, 'Summary.xlsx');
    }
}
