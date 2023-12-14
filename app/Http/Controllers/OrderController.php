<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use PDF;
use App\Models\Store\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        // if ($store)  abort(403);
        $orders = Order::with('carts', 'carts.product')
            ->whereHas('carts.product', function ($q) use ($store) {
                $q->where('store_id', $store->id);
            });
        if ($request->key || $request->status) {
            $orders = $orders->where('no_order', 'LIKE', '%' . $request->key . '%');
            if ($request->status) {
                $orders = $orders->where('status', $request->status);
            }
        }
        $orders = $orders->fastPaginate(10);

        foreach ($orders as $order) {
            $carts =  Cart::where('order_id', $order->id)->get();
            foreach ($carts as $cart) {
                $cart->total = $cart->quantity * $cart->product->price;
            }
            $delivery = $order->type_delivery  == 0 ? 5000 : 10000;
            $order->total =  $carts->sum('total') + $delivery;
        }

        return view('order.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $send_wa = env('SEND_WA');
        $this->validate($request, [
            'alamat' => 'required',
            'type_delivery' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $carts = Cart::where('user_id', auth()->user()->id)->where('status', 0)->get();
            foreach ($carts as $cart) {
                $stok = $cart->product->stok;
                if ($stok == 0) {
                    Alert::error('Produk sudah habis !', 'Silahkan cari produk yang lainnya !');
                    return redirect()->route('products.index');
                }
                if ($cart->product->store->is_active == 0) {
                    Alert::error('Produk Tersedia !', 'Produk tidak tersedia dikarenakan toko tutup !');
                    return redirect()->route('cart.index');
                }
            }
            foreach ($carts as $cart) {
                $product = Produk::find($cart->product_id);
                $product->update(['stok' => $product->stok - $cart->quantity]);
            }


            $no_order = strtoupper(Str::random(1) . auth()->user()->id . now()->format('d') . rand(1000, 9999));
            $order = Order::create([
                'no_order' => $no_order,
                'alamat' => $request->alamat,
                'note' => $request->note,
                'type_delivery' => $request->type_delivery,
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);
            $carts =  Cart::with('product.store.user')->where('user_id', auth()->user()->id)->where('status', 0)->get();
            foreach ($carts as $cart) {
                $cart->update(['order_id' => $order->id, 'status' => 1]);
                $cart->total = $cart->quantity * $cart->product->price;
            }
            $delivery = $order->type_delivery  == 0 ? 5000 : 10000;
            $order->total =  $carts->sum('total') + $delivery;
            DB::commit();
            Alert::success('Order Berhasil Dibuat !');
            return redirect(route('orders.show', $order->id));
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::warning('Sistem Sibuk !', 'Silahkan coba beberapa saat lagi');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $carts = Cart::with('product.store')->where('order_id', $order->id)->get();
        foreach ($carts as $cart) {
            $cart->total = $cart->quantity * $cart->product->price;
        }
        $user = User::find($order->user_id);
        $user_id_store = $carts->pluck('product.store.user.id', 'product.store.user.id');
        $user_id = [];
        foreach ($user_id_store as $user_store) {
            array_push($user_id, $user_store);
        }
        if (auth()->user()->id == $order->user_id || in_array(auth()->user()->id, $user_id)) {
            return view('order.show', compact('order', 'carts', 'user'));
        }
        abort(403);
    }

    public function orderPembeli()
    {
        $orders = Order::with('carts', 'carts.product')
            ->where('user_id', auth()->user()->id)
            ->latest()->fastPaginate(10);

        foreach ($orders as $order) {
            $carts =  Cart::where('order_id', $order->id)->get();
            foreach ($carts as $cart) {
                $cart->total = $cart->quantity * $cart->product->price;
            }

            $delivery = $order->type_delivery  == 0 ? 5000 : 10000;
            $order->total =  $carts->sum('total') + $delivery;
        }
        return view('order.index', compact('orders'));
    }

    public function show_order(Order $order)
    {
        return response()->json($order, 200);
    }
    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        // return back();
        return response()->json($order, 200);
    }
}
