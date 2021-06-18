<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;

class StudentExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{

    public function collection()
    {
        return Student::with(['classroom'])->get();
    }

    public function map($student): array
    {
        return [
            $student->code,
            $student->name,
            $student->email,
            $student->phone,
            $student->birthday,
            $student->sex === 0 ? 'Nam' : 'Nữ',
            $student->nation,
            $student->classroom->name
        ];
    }

    public function headings(): array
    {
        return [
            'Code',
            'Name',
            'Email',
            'Phone',
            'Birthday',
            'Sex',
            'Nation',
            'Classroom'
        ];
    }

    public function registerEvents(): array
    {
        return [
          AfterSheet::class => function (AfterSheet $event) {
            $event->sheet->getStyle('A1:F1')->applyFromArray([
               'font' => [
                    'bold' => true
               ]
            ]);
          }
        ];
    }
}
