<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = ([
        'name_sekolah',
        // 'alamat',
        // 'no_telp',
        // 'email',
        // 'logo',
        // 'status',
    ]);
}
