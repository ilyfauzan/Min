<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        $stores = Store::all();
        $title = "Daftar Toko";
        return view('admin.toko.list', compact('stores', 'title'));
    }
}
