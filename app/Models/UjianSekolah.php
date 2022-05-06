<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Kelas;
use App\Models\User;
use App\Models\DistribusiUjianKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UjianSekolah extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ([
        'id_kelas',
        'id_user',
        'id_sekolah_asal',
        'id_category_ujian',
        'id_soal_ujian',
        'pila',
        'pilb',
        'pilc',
        'pild',
        'id_jawaban',
    ]);

     // ujianSekolah butuh Kelas untuk manggil id_user
     public function kelas()
     {
            return $this->belongsTo(Kelas::class, 'id_kelas');
     }

     public function user()
     {
            return $this->belongsTo(User::class, 'id_user');
     }

     public function category()
     {
         return $this->belongsTo(Category::class, 'id_category_ujian');
     }

     public function distribusiUjianKelas()
     {
            return $this->belongsTo(DistribusiUjianKelas::class, 'id_category','id_category_ujian','id_kelas');
     }

}
