<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSekolah extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_user', 'id_category_ujian', 'id_soal_ujian', 'pilihan_jawaban','id_jawaban',
    ]);
}
