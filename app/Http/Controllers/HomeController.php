<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Store\Store;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function __invoke(Request $request)
    {
        $stores = Store::where('is_active', true)->skip(0)->take(6)->get();
        $products = Produk::with('store')
            ->whereHas('store', fn ($q) => $q->where('is_active', true))
            ->latest()->fastPaginate(9);
        $banners = Banner::all();
        return view('welcome', compact('stores', 'products', 'banners'));
    }
}
