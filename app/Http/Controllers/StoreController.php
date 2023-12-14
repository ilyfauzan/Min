<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Store\Store;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['role:Pembeli'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        if (!$store) return view('store.not-found');
        return view('store.edit', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'logo'     => 'image|mimes:png,jpg,jpeg',
            'name'     => 'required',
            'description'   => 'required',
            'logo'   => 'required'
        ]);

        $duplicate = Store::where('name', $request->name)->first();
        if ($duplicate) return back()->with('error', 'Nama Toko Sudah ada');
        $store = Store::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        if ($request->logo) {
            $image = $request->file('logo');
            // $image->storeAs('store/images/', $image->hashName());
            // $store->update(['logo' => $image->hashName()]);
            // $image_path = $request->file('image')->store('image/user', 'public');
            // $store->update(['image' => $image->hashName()]);

            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/store/', $name);
            $store->update(['logo' => $name]);
        }
        $user = Auth::user();
        $roles = ['Penjual'];
        $user->assignRole($roles);
        return redirect()->route('store.index')
            ->with('success', 'Store created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Store $store)
    {
        $categories = Category::all();

        $products = Produk::where('store_id', $store->id)->with('category')->where('name', 'LIKE', '%' . $request->key . '%');
        if ($request->category_id) {
            $products = $products->where('category_id', $request->category_id);
        }

        $products = $products->latest()->fastPaginate(10);
        return view('store.show', compact('store', 'categories', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $this->validate($request, [
            'logo'     => 'image|mimes:png,jpg,jpeg',
            'name'     => 'required',
            'description'   => 'required'
        ]);
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        if ($request->logo) {
            $image = $request->file('logo');
            // $image->storeAs('store/images/', $image->hashName());
            // $store->update(['logo' => $image->hashName()]);

            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/store/', $name);
            $store->update(['logo' => $name]);
        }
        Alert::success('Toko Berhasil Diupdate !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function product()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        $products = Produk::where('store_id', $store->id)->with('category')->get();
        $out_of_stock = Produk::where('store_id', $store->id)->where('stok', 0)->count();
        $title = 'Daftar Produk';
        return view('admin.toko.produk', compact(
            [
                'store',
                'products',
                'title',
                'out_of_stock'
            ]
        ));
        // return view('store.product', compact('store', 'products'));
    }
    public function order()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        $products = Produk::where('store_id', $store->id)->with('category')->get();
        $out_of_stock = Produk::where('store_id', $store->id)->where('stok', 0)->count();
        $title = 'Daftar Pesanan';
        return $orders = Order::with('carts')->get();

        return view('admin.toko.pesanan', compact(
            [
                'store',
                'products',
                'title',
                'out_of_stock'
            ]
        ));
        // return view('store.product', compact('store', 'products'));
    }

    public function active(Store $store)
    {
        if ($store->is_active == true) {
            $store->update(['is_active' => false]);
            $message = 'Ditutup !';
        } else {
            $store->update(['is_active' => true]);
            $message = 'Dibuka !';
        }

        return back()
            ->with('success', 'Toko Berhasil ' . $message);
    }
}
