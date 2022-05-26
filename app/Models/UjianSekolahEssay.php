<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSekolahEssay extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_kelas',
        'id_user',
        'id_sekolah_asal',
        'id_category_pelajaran',
        'id_category_ujian',
        'id_soalujian_essay',
        'id_jawaban_essay',
    ]);

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category_ujian()
    {
        return $this->belongsTo(CategoryUjian::class, 'id_category_ujian');
    }

    public function category_pelajaran()
    {
        return $this->belongsTo(Category::class, 'id_category_pelajaran');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_soalujian_essay');
    }

    public function postEssay()
    {
        return $this->belongsTo(PostEssay::class, 'id_soalujian_essay','id','id_jawaban_essay');
    }


}
