<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostEssay extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_sekolah_asal','id_category','soal_ujian_essay','jawaban_essay'
    ]);

    public function category_pelajaran()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function category_ujian()
    {
        return $this->belongsTo(CategoryUjian::class, 'id_category');
    }

     public function user()
     {
            return $this->belongsTo(User::class, 'id_user');
     }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal');
    }

}
