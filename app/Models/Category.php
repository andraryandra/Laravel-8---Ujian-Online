<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ([
        'name_category',
    ]);

    public function post()
    {
        return $this->hasMany(Post::class,'id_category');
    }


}
