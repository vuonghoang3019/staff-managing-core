<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'code'          => $row['code'],
            'name'          => $row['name'],
            'birthday'      => $row['birthday'],
            'sex'           => $row['sex'],
            'nation'        => $row['nation'],
            'classroom_id'  => $row['classroom_id'],
        ]);
    }
}
