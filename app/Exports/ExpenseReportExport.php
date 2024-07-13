<?php

namespace App\Exports;

use App\Models\Exprnse;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenseReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Exprnse::all();
    }
}
