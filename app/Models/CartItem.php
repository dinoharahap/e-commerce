<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'total', 'status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    // Scope untuk cart aktif
    public function scopeCart($query)
    {
        return $query->where('status', 'cart');
    }
}