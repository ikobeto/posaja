<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    protected $table = 'user_role'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
    public function role()
    {
        return $this->belongsTo(role::class, 'role_id');
    }
    public function user()
    {
        return $this->belongsTo(role::class, 'user_id');
    }
}
