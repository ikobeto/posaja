<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_selling extends Model
{
    protected $table = 'detail_selling'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'product_id',
        'selling_id',
        'user_id',
        'discount_id',
        'discount_amount',
        'amount_product',
        'subtotal',
        'sellings_price',
        'cost_price',
        'profit',
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
    public function sellings()
    {
        return $this->belongsTo(sellings::class, 'selling_id');
    }
    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    public function discount()
    {
        return $this->belongsTo(discounts::class, 'discount_id');
    }
}
