<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false; // TAMBAHKAN INI
    protected $fillable = [
        'user_id', 'order_id', 'subtotal', 'ongkos_kirim', 'total',
        'status', 'payment_method', 'alamat', 'no_hp', 'nama_penerima', 'catatan', 'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}