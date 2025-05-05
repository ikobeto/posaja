<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discounts extends Model
{
    protected $table = 'discounts'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'name',
        'value',
        'user_id',
        'min_qty',
        'buy_qty',
        'get_qty',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
}
