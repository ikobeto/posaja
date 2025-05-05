<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock_mutation extends Model
{
    protected $table = 'stock_mutation'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'stock_id',
        'product_id',
        'rf_type',
        'rf_id',
        'qty',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function stock()
    {
        return $this->belongsTo(stocks::class, 'stock_id');
    }
}
