<?php

namespace App\Exports;

use App\Models\Admin;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use carbon\Carbon;

class AdminExport implements FromView
{
    public function view(): View
    {
        $to = Carbon::now()->format('Y-m-d');
        $from = date('Y-m-d', strtotime('-7 days', strtotime($to)));
        $last_7days_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->get();
        $last_7days_all_income= Income::where('income_status',1)->where('income_date','<=',$to)->where('income_date','>=',$from)->sum('income_amount');
        $last_7days_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->get();
        $last_7days_all_expense= Expense::where('expense_status',1)->where('expense_date','<=',$to)->where('expense_date','>=',$from)->sum('expense_amount');
        return view('admin.dashboard.excel',compact('to','from','last_7days_income','last_7days_all_income','last_7days_expense','last_7days_all_expense'));
    }
}
