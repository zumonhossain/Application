<?php

namespace App\Exports;

use App\Models\ExpenseCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpenseCategoryExport implements FromView
{
    public function view(): View
    {
        return view('admin.expense-category.excel', [
            'all' => ExpenseCategory::all()
        ]);
    }
}
