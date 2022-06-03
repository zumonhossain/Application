<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpenseExport implements FromView
{
    public function view(): View
    {
        return view('admin.expense.excel', [
            'all' => Expense::all()
        ]);
    }
}
