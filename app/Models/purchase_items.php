<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase_items extends Model
{
    protected $table = 'purchase_items'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'purchase_id',
        'product_id',
        'price',
        'qty',
        'subtotal',
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
    public function purchase()
    {
        return $this->belongsTo(purchase::class, 'purchase_id');
    }
}
