<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        $title = "Daftar Banner";
        return view('admin.banner.index', compact('banner', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Banner";
        return view('admin.banner.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = Banner::create([
            'label' => $request->label,
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banner/', $name);
            $banner->update(['image' => $name]);
        }
        Alert::success('Banner Berhasil Dibuat !');
        return redirect(route('banner.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $title = "Edit Banner";
        return view('admin.banner.create', compact('banner', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->update([
            'label' => $request->label,
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banner/', $name);
            $banner->update(['image' => $name]);
        }
        Alert::success('Banner Berhasil diupdate !');
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        Alert::success('Banner Berhasil Dihapus !');
        return redirect(route('banner.index'));
    }
}
