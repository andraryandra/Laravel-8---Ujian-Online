<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'id_category' => $row['id_category'],
            'soal_ujian' => $row['soal_ujian'],
            'pilihan_a' => $row['pilihan_a'],
            'pilihan_b' => $row['pilihan_b'],
            'pilihan_c' => $row['pilihan_c'],
            'pilihan_d' => $row['pilihan_d'],
            'jawaban' => $row['jawaban'],
        ]);
    }
}
