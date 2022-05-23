<?php

namespace App\Imports;

use App\Models\PostEssay;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PostEssayImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PostEssay([
            'id_category' => $row['id_category'],
            'soal_ujian_essay' => $row['soal_ujian_essay'],
            'jawaban_essay' => $row['jawaban_essay'],
        ]);
    }
}
