<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{  
    use softDeletes;
    protected $table = 'product'; // Pastikan tabel ini sesuai dengan database
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $timestamps = true; // Pastikan timestamps aktif

    protected $fillable = [
        'name',
        'category_id',
        'code_plu',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function category()
    {
        return $this->belongsTo(category_product::class, 'category_id');
    }
}
