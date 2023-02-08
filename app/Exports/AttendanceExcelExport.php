<?php

namespace App\Exports;

use App\Models\Attendence;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class AttendanceExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.attendenceExcel', [
            'attendances' => Attendence::all()
        ]);
    }
}
