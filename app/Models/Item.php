<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nama_item', 'harga', 'deskripsi', 'gambar'
    ];
    
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
