<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'Product';

    // Specify the fillable columns
    protected $fillable = [
        'category',
        'name',
        'marca',
        'pic',
        'description',
        'user_id',
    ];

    // Define the relationship with Qr
    public function qrs()
    {
        return $this->hasMany(Qr::class, 'product_id');
    }
}