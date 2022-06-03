<?php

namespace App\Exports;

use App\Models\Admin;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use carbon\Carbon;

class SummaryExport implements FromView{
    public function view(): View{
        $month= Carbon::now()->format('m');
        $fullMonth= Carbon::now()->format('F');
        $year= Carbon::now()->format('Y');
        $incomes =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->get();
        $incomeTotal =  Income::where('income_status',1)->whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->sum('income_amount');
        $expense =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->get();
        $expenseTotal =  Expense::where('expense_status',1)->whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->sum('expense_amount');
        return view('admin.summary.excel',compact('month','fullMonth','year','incomes','incomeTotal','expense','expenseTotal'));
    }
}
