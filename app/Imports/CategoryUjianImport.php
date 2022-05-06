<?php

namespace App\Imports;

use App\Models\CategoryUjian;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CategoryUjianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CategoryUjian([
            'name_category_ujian' => $row['name_category_ujian'],
        ]);
    }
}
