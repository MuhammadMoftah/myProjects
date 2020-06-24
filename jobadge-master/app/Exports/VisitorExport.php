<?php

namespace App\Exports;

use App\Visitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitorExport implements FromCollection, WithStrictNullComparison, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $visitors = Visitor::select('ip', 'browser', 'created_at')->get();
        return $visitors;
    }

    public function headings(): array
    {
        return [
            'ip',
            'browser',
            'created_at'
        ];
    }
}
