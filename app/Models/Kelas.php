<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\UjianSekolah;
use App\Models\CategoryUjian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    public $timeStamps = true;
    protected $table = 'kelas';

    protected $fillable = [
        'id_wali',
        'id_sekolah_asal',
        'name_kelas'
    ];


    // Kelas butuh User untuk manggil Wali kelas
    public function user()
    {
        return $this->belongsTo(User::class, 'id_wali');
    }

    // Kelas butuh banyak kelas di ujianSekolah
    public function ujianSekolah()
    {
        return $this->hasMany(UjianSekolah::class, 'id_user');
    }

    public function distribusiUjianKelas()
    {
        return $this->hasMany(DistribusiUjianKelas::class, 'id_kelas');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal');
    }

}
