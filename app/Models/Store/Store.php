<?php

namespace App\Models\Store;

use App\Models\Produk\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function product()
    {
        return $this->hasMany(Produk::class, 'store_id', 'id');
    }
}
