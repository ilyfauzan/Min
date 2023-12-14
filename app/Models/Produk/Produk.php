<?php

namespace App\Models\Produk;

use App\Models\Cart;
use App\Models\Category;
use App\Models\ProdukPhotos;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function photos()
    {
        return $this->hasMany(ProdukPhotos::class, 'produk_id');
    }
    public function thumbnail()
    {
        return $this->hasOne(ProdukPhotos::class, 'produk_id')->where('is_thumbnail', true)->first();
    }
    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
