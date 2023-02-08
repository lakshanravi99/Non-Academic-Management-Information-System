<?php

namespace App\Imports;

use App\Models\Attendence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class AttendanceImport implements ToModel,WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */




    public function model(array $row)
    {
     
     
        return new Attendence([
            'emp_id'     => $row['empid'],
            'fname'    => $row['fname'],
            'arrival_time' => $row['arrival'],
            'leave_time' => $row['leave'],
            'status' => $row['status'],
            'date' =>Date::excelToDateTimeObject($row['date'])->format('Y-m-d'),
        ]);
    }

//    public function columnFormats(): array
//    {
//        return [
//            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
//            'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
//        ];
//    }

public function map($row): array
{
    // TODO: Implement map() method.
}}
