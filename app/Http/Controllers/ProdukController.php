<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Store\Store;
use App\Models\ProdukPhotos;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use Illuminate\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Produk::where('name', 'LIKE', '%' . $request->key . '%');
        if ($request->category_id) {
            $products = $products->where('category_id', $request->category_id);
        }

        $products = $products->latest()->fastPaginate(10);
        // return $request->all();
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $title = 'Tambah Produk';
        // return view('products.create', compact('categories'));
        return view('admin.toko.add-produk', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $product = Produk::create([
            'store_id' => Store::where('user_id', auth()->user()->id)->first()->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => cleanMoneyFormat($request->price),
            'stok' => $request->stok,
            'description' => $request->description,
        ]);
        if ($request->file('foto')) {
            $image = $request->file('foto');

            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/product/' . $product->name, $name);

            // $image->storeAs('product/images/', $image->hashName());
            ProdukPhotos::create([
                'produk_id' => $product->id,
                'foto' => $name,
            ]);
        }
        Alert::success('Produk Berhasil Dibuat !');
        // return back();
        return redirect(route('produk.edit', $product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {

        $photos = ProdukPhotos::where('is_thumbnail', false)->where('produk_id', $produk->id)->get();

        return view('products.show', compact('produk', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $photos = ProdukPhotos::where('produk_id', $produk->id)->get();
        $categories = Category::all();
        $title = 'Edit Produk';
        return view('admin.toko.add-produk', compact('categories', 'title', 'produk', 'photos'));
        // return view('products.create', compact('categories', 'produk', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->file('foto')) {
            foreach ($request->foto as $key => $value) {
                $image = $request->file('foto')[$key];

                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/product/' . $produk->name, $name);

                // $image->storeAs('product/images/', $image->hashName());
                ProdukPhotos::create([
                    'produk_id' => $produk->id,
                    'foto' => $name,
                ]);
            }
        } else {
            $product = Produk::find($produk->id);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => cleanMoneyFormat($request->price),
                'stok' => $request->stok,
                'description' => $request->description,
            ]);
        }

        Alert::success('Produk Berhasil Diupdate !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function addtocart(Request $request)
    {
        $product = Produk::find($request->produk_id);
        if ($product->stok == 0) {
            Alert::warning('Stok Habis !', 'Silahkan cari produk lainnya !');
            return back();
        }
        if ($product->store->is_active == 0) {
            Alert::warning('Toko Tutup !', 'produk tidak tersedia untuk sementara waktu !');
            return back();
        }
        $cart = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->produk_id)
            ->where('status', 0)
            ->first();
        if ($cart) {
            $cart->update(['quantity' => $cart->quantity + 1]);
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->produk_id,
                'quantity' => $request->quantity
            ]);
        }
        Alert::success('Produk Berhasil Dimasukan Ke Keranjang !', 'Silahkan periksa keranjang anda !');
        return back();
    }
}
