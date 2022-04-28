<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $timeStamps = true;
    protected $table = 'kelas';

    protected $fillable = [
        'id_wali', 
        'name_kelas'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_kelas');
    }

}
