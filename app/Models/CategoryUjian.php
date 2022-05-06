<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUjian extends Model
{
    use HasFactory;
    protected $fillable = ([
        'name_category_ujian',
    ]);
}
