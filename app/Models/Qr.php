<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'Qr';

    // Specify the fillable columns
    protected $fillable = [
        'product_id',
        'end',
        'distancia',
        'puntuacion',
    ];

    // Define the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}