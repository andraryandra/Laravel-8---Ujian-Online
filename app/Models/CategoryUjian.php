<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUjian extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_sekolah_asal',
        'name_category_ujian',
    ]);

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal');
    }
}
