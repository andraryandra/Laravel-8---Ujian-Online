<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authentication_log extends Model
{
    use HasFactory;
    protected $table = 'authentication_log';
    protected $fillable = ([
        'authenticatable_type',
        'authenticatable_id',
        'ip_address',
        'user_agent',
        'login_at',
        'login_successful',
        'logout_at',
        'cleared_by_user',
        'location',
        'created_at',
        'updated_at'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class, 'authenticatable_id');
    }
}
