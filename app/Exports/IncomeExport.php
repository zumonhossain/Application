<?php

namespace App\Exports;

use App\Models\Income;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeExport implements FromView
{
    public function view(): View
    {
        return view('admin.income.excel', [
            'all' => Income::all()
        ]);
    }
}