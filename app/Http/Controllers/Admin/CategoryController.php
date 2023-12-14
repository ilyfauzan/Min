<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $title = 'Daftar Kategori';
        return view('admin.kategori.index', compact('categories', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Kategori';
        return view('admin.kategori.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator()->make(request()->all(), [
            'name' => 'required|unique:categories',
        ]);
        $category = Category::create(['name' => $request->name]);
        Alert::success('Kategori Berhasil Ditambahkan !');
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $title = 'Edit Kategori';
        return view('admin.kategori.create', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update(['name' => $request->name]);
        Alert::success('Kategori Berhasil Diupdate !');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $count_product = Produk::where('category_id', $category->id)->count();
        if ($count_product > 0) {
            Alert::error('Kategori tidak dapat dihapus !', 'Kategori sudah dipakai di salah satu produk berjalan !');
            return redirect(route('category.index'));
        }
        $category->delete();
        Alert::success('Kategori Berhasil Dihapus !');
        return redirect(route('category.index'));
    }
}
