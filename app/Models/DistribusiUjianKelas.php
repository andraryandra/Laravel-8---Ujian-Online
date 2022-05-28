<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Category;
use App\Models\CategoryUjian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiUjianKelas extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_kelas',
        'id_sekolah_asal',
        'id_category',
        'id_category_ujian',
        'status',
    ]);

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function categoryUjian()
    {
        return $this->belongsTo(CategoryUjian::class, 'id_category_ujian');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal');
    }


}
