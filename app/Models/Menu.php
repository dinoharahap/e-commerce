<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'products'; // nama table

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar'
    ];

    public function cartItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
