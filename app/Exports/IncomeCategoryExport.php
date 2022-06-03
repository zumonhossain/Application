<?php

namespace App\Exports;

use App\Models\IncomeCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeCategoryExport implements FromView
{
    public function view(): View
    {
        return view('admin.income-category.excel', [
            'all' => IncomeCategory::all()
        ]);
    }
}