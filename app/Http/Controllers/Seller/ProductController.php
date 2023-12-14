<?php

namespace App\Http\Controllers\Seller;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Store\Store;
use App\Models\ProdukPhotos;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        $products = Produk::where('store_id', $store->id)->with('category')->latest()->fastPaginate(10);
        $out_of_stock = Produk::where('store_id', $store->id)->where('stok', 0)->count();
        return view('seller.product.index', compact(
            [
                'store',
                'products',
                'out_of_stock'
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('seller.product.create', compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'description' => 'required',
            'foto' => 'required',
        ]);
        $product = Produk::create([
            'store_id' => Store::where('user_id', auth()->user()->id)->first()->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => cleanMoneyFormat($request->price),
            'stok' => $request->stok,
            'jenis' => $request->jenis,
            'description' => $request->description,
        ]);
        if ($request->file('foto')) {
            $image = $request->file('foto');

            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/product/', $name);

            ProdukPhotos::create([
                'produk_id' => $product->id,
                'foto' => $name,
                'is_thumbnail' => true,
            ]);
        } else {
            return back()
                ->with('error', 'Tambahkan minimal 1 foto !');
        }
        if ($request->file('gambar')) {
            foreach ($request->gambar as $key => $value) {
                $image = $request->file('gambar')[$key];

                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/product/', $name);
                ProdukPhotos::create([
                    'produk_id' => $product->id,
                    'foto' => $name,
                ]);
            }
        }
        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Produk::find($id);
        $categories = Category::all();
        $photos = ProdukPhotos::where('produk_id', $product->id)->orderBy('is_thumbnail', 'DESC')->get();
        return view('seller.product.edit', compact('categories', 'product', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'description' => 'required',
        ]);
        $product = Produk::find($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => cleanMoneyFormat($request->price),
            'stok' => $request->stok,
            'jenis' => $request->jenis,
            'description' => $request->description,
        ]);
        if ($request->file('foto')) {
            $image = $request->file('foto');

            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/product/', $name);

            ProdukPhotos::where('is_thumbnail', true)->where('produk_id', $product->id)->delete();
            ProdukPhotos::create([
                'produk_id' => $product->id,
                'foto' => $name,
                'is_thumbnail' => true,
            ]);
        }
        if ($request->file('gambar')) {
            foreach ($request->gambar as $key => $value) {
                $image = $request->file('gambar')[$key];

                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/product/', $name);

                // $image->storeAs('product/images/', $image->hashName());
                ProdukPhotos::create([
                    'produk_id' => $product->id,
                    'foto' => $name,
                ]);
            }
        }
        return back()
            ->with('success', 'Produk berhasil diperbaharui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =   Produk::find($id);
        $carts = Cart::where('product_id', $product->id)->count();
        if ($carts != 0)
            return back()
                ->with('error', 'Produk tidak dapat dihapus sementara !');
        else {
            $product->photos->delete();
            return back()
                ->with('success', 'Produk berhasil dihapus !');
        }
    }
    public function delete_photo($id)
    {
        $photo = ProdukPhotos::find($id);
        if ($photo->is_thumbnail == true) return back()->with('error', 'Foto Utama tidak dapat dihapus !');
        if (file_exists(asset('images/product/', $photo->foto))) unlink(asset('images/product/', $photo->foto));
        $photo->delete();
        return back()->with('success', 'Foto Produk berhasil dihapus !');
    }
}
