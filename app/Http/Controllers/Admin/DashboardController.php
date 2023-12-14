<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Store\Store;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) return redirect()->to(route('dashboard.admin'));
        else if (auth()->user()->hasRole('Penjual')) return redirect()->to(route('dashboard.penjual'));
        else return redirect()->to(route('dashboard.pembeli'));
    }

    public function admin()
    {
        $title = 'Dashboard';
        $hour = now()->format('H');
        if ($hour < 10) $time = 'Pagi';
        else if ($hour < 14) $time = 'Siang';
        else if ($hour < 17) $time = 'Sore';
        else $time = 'Malam';
        $store = Store::all();
        $stores = Store::with('product.cart', 'user')->get();
        $user = User::all();
        $carts = Cart::with('product.store')->where('status', 1)->get();
        foreach ($stores as $item) {
            $terjual = 0;
            foreach ($item->product as $product) {
                $quantity = $product->cart->sum('quantity');
                $terjual += $quantity;
            }
            $item->terjual = $terjual;
        }
        $stores->sortByDesc("terjual");;
        $product = Produk::all();
        $orders = null;
        return view('admin.dashboard.admin', compact([
            'title',
            'time',
            'store',
            'user',
            'product',
            'orders', 'stores'
        ]));
    }

    public function penjual()
    {
        $hour = now()->format('H');
        if ($hour < 10) $time = 'Pagi';
        else if ($hour < 14) $time = 'Siang';
        else if ($hour < 17) $time = 'Sore';
        else $time = 'Malam';
        $user = User::all();
        $cart = Cart::where('status', 1)->get();
        $store = Store::where('user_id', auth()->user()->id)->first();
        $products = Produk::where('store_id', $store->id)->with('category')->get();
        $out_of_stock = Produk::where('store_id', $store->id)->where('stok', 0)->count();
        $orders = Order::with('carts', 'carts.product')
            ->whereHas('carts.product', function ($q) use ($store) {
                $q->where('store_id', $store->id);
            })
            ->get();

        foreach ($orders as $order) {
            $carts =  Cart::where('order_id', $order->id)->get();
            foreach ($carts as $cart) {
                $cart->total = $cart->quantity * $cart->product->price;
            }
            $delivery = $order->type_delivery  == 0 ? 5000 : 10000;
            $order->total =  $carts->sum('total') + $delivery;
        }

        return view('admin.dashboard.penjual', compact([
            'time',
            'store',
            'user',
            'cart',
            'products',
            'orders',
            'out_of_stock'
        ]));
    }

    public function pembeli()
    {
        $hour = now()->format('H');
        if ($hour < 10) $time = 'Pagi';
        else if ($hour < 14) $time = 'Siang';
        else if ($hour < 17) $time = 'Sore';
        else $time = 'Malam';
        $orders = Order::with('carts', 'carts.product')
            ->where('user_id', auth()->user()->id)
            ->get();

        foreach ($orders as $order) {
            $carts =  Cart::where('order_id', $order->id)->get();
            foreach ($carts as $cart) {
                $cart->total = $cart->quantity * $cart->product->price;
            }
            $delivery = $order->type_delivery  == 0 ? 5000 : 10000;

            $order->total =  $carts->sum('total') + $delivery;
        }

        return view('admin.dashboard.pembeli', compact([
            'time',
            'orders',
        ]));
    }
}
