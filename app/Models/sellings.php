<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sellings extends Model
{
    protected $table = 'sellings'; // Pastikan tabel ini sesuai dengan database
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'customer_id',
        'discount_id',
        'date',
        'total',
        'total_discount',
        'grand_total',
        'total_profit',
        'payment_amount',
        'chage',
        'payment_method',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
    public function discount()
    {
        return $this->belongsTo(discounts::class, 'discount_id');
    }
}
