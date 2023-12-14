@extends('layouts.main', ['title' => 'Beranda'])
@section('content')
    <div class="row justify-content-between mb-2 align-items-center">
        <div class="col-lg-5">
            <div>
                <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base">Hallo, Selamat Datang</h1>
                <p class="lead text-muted lh-base mb-4">Temukan apa yang anda cari disini.</p>
                <div class="">
                    <a href="{{ route('produk.index') }}" class="btn btn-primary"><i
                            class="ri-store-3-line align-bottom me-1"></i> Cari Produk</a>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-7">
            <div class="position-relative home-img text-center mt-5 mt-lg-0">
                <div class="live-preview">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($banners as $key => $item)
                                <li data-bs-target="#carouselExampleFade" data-bs-slide-to="{{ $key }}"
                                    class="@if ($key == 0) active @endif"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($banners as $key => $item)
                                <div class="carousel-item @if ($key <= 0) active @endif">
                                    <img class="d-block img-fluid mx-auto"
                                        src="{{ asset('images/banner/' . $item->image) }}" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="circle-effect">
                    <div class="circle"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 mb-5 justify-content-center">
        <h1>Toko Terpercaya</h1>
    </div>
    <div class="row mb-1">
        @foreach ($stores as $store)
            <div class="col-xxl-4 col-lg-6">
                <div class="card">
                    <div>
                        <div class="avatar-title mt-4 rounded" style="background-color: white">
                            @if ($store->logo != null)
                                <img class="mb-2" src="{{ asset('images/store/' . $store->logo) }}" alt="logo"
                                    height="100" />
                            @else
                                <img src="{{ asset('velzon/img/') }}/icon.png" alt="" height="100">
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $store->name }}</h4>
                        <p style="text-align: justify; overflow: hidden;
                                   display: -webkit-box;
                                   -webkit-line-clamp: 2; /* number of lines to show */
                                           line-clamp: 2; 
                                   -webkit-box-orient: vertical;"
                            class="card-text text-muted text-wrap">{{ $store->description }}</p>
                        <p class="card-text">
                            <a href="{{ route('store.show', $store->id) }}" class="btn btn-success stretched-link">Jelajahi
                                Toko</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex mt-5 mb-5 justify-content-center">
        <h1>Produk Terbaru</h1>
    </div>
    <div class="row mb-2">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" style="height: 300px;"
                        src="{{ asset('images/product/' . $product->thumbnail()->foto) }}" alt="foto-{{ $product->name }}">
                    {{-- <img class="card-img-top img-fluid" src="{{ asset('velzon/assets/') }}/images/small/img-6.jpg"
                        alt="Card image cap"> --}}
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $product->name }}</h4>
                        <p class="card-text text-muted text-wrap">
                            Rp {{ number_format($product->price, 2) }}</p>
                        <p class="card-text">
                            <a href="{{ route('produk.show', $product->id) }}" class="btn btn-success stretched-link">Lihat
                                Detail</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-2">
            {{ $products->links('admin.layouts.paginate') }}
        </div>
    @endsection
