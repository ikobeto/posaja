<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discount_product extends Model
{
    protected $table = 'detail_selling'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'product_id',
        'discount_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
    public function discount()
    {
        return $this->belongsTo(discounts::class, 'discount_id');
    }
}
