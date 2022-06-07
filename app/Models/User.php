<?php

namespace App\Models;

use App\Models\Post;


use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\UjianSekolah;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        // 'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class,'id_user','id_category');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas');

        // Wali kelas banyak dipakai oleh kelas
        return $this->hasMany(Kelas::class,'id_wali');
    }

    public function ujiansekolah()
    {

        return $this->hasMany(UjianSekolah::class,'id_user');
    }

   public function sekolah()
    {
        return $this->belongsTo(Sekolah::class,'sekolah_asal');
    }

}
