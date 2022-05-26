<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas',
        'id_user',
        'id_sekolah_asal',
        'id_category_ujian',
        'id_category_pelajaran',
        'id_ujiansekolah',
        'total_correct',
        'total_nilai',
    ];

    // ujianSekolah butuh Kelas untuk manggil id_user
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
        return $this->hasMany(Post::class);
    }

    public function postEssay()
    {
        return $this->hasMany(PostEssay::class);
    }

    public function distribusiUjianKelas()
     {
            return $this->belongsTo(DistribusiUjianKelas::class, 'id_category','id_category_ujian','id_kelas');
     }

}
