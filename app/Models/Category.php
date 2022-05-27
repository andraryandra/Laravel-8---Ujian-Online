<?php

namespace App\Models;

use App\Models\Post;
use App\Models\UjianSekolah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ([
        'id_sekolah_asal',
        'name_category',
    ]);

    public function post()
    {
        return $this->hasMany(Post::class, 'id_category')->withDefault();
    }

    public function ujianSekolah()
    {
        return $this->hasMany(UjianSekolah::class, 'id_category_ujian');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal');
    }




}
