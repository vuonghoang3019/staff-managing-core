<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class TeacherExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithEvents
{

    public function collection()
    {
        return User::all();
    }

    public function map($teacher): array
    {
        return [
          $teacher->code,
          $teacher->name,
          $teacher->email,
          $teacher->password
        ];
    }

    public function headings(): array
    {
        return [
            'Code',
            'Name',
            'Email',
            'Password',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
