<?php

namespace App\Imports;

use App\Models\Classroom;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;

class StudentImport implements ToCollection, WithHeadingRow, WithValidation
{

    public function collection(Collection $rows)
    {
        $student = new  Student();
        foreach ($rows as $row) {
            $student->newQuery()->create([
                'code' => $row['code'],
                'name' => $row['name'],
                'birthday' => $row['birthday'],
                'sex' => $row['sex'],
                'nation' => $row['nation'],
                'classroom_id' => $row['classroom']
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.code' => ['unique:student,code']
        ];
    }


}
