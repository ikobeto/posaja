<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    protected $table = 'suppliers'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'name',
        'addres',
        'no_tlp',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
