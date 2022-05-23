<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostEssay extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_category','soal_ujian_essay','jawaban_essay'
    ]);

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

}
