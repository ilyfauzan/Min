<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $stok = $cart->product->stok;
            if ($stok == 0) {
                Alert::error('Produk sudah habis !');
                return back();
            }
        }
        $purchase =  Purchase::create([
            'type_delivery' => $request->type_pengiriman,
            'user_id' => auth()->user()->id
        ]);
        Alert::success('Segera Lakukan Pembayaran !');

        return redirect(route('purchase.show', $purchase->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->product->price;
        }
        $total = $total + $purchase->type_delivery;
        return view('purchase.show', compact('purchase', 'carts', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function checkout(Request $request, Purchase $purchase)
    {
        $purchase->update(['status' => 1]);
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'purchase_id' => $purchase->id,
            'jalan' => $request->jalan,
            'jalan_tambahan' => $request->jalan_tambahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'note' => $request->note,
        ]);
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $cart->update(['status' => 1, 'order_id' => $order->id]);
        }
        Alert::success('Order Sudah Dibuat Silahkan Menunggu Barang Anda Sampai Rumah !');

        return redirect(route('order.index'));
    }
}
