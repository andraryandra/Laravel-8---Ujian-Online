<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_category', 'soal_ujian', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'jawaban',
    ]);

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }

}
