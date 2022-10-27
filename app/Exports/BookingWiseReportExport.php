<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingWiseReportExport implements FromArray, WithHeadings, ShouldAutoSize
{
    public function __construct(public $headings, public $data)
    {
    }

    /**
     * @return \Illuminate\Support\Array
     */
    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
