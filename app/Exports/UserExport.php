<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    public function view(): View
    {
        return view('admin.user.excel', [
            'all' => User::all()
        ]);
    }
}
