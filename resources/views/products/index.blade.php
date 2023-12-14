@extends('layouts.main', ['title' => 'Produk'])
@section('content')
    <div class="d-flex justify-content-center mb-2">
        <h1>Produk Terbaru</h1>
    </div>
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header border-0 rounded">
                <form action="{{ route('produk.index') }}" method="get">
                    <div class="row g-2">
                        <div class="col-xl-4">
                            <div class="search-box">
                                <input type="text" value="{{ old('key') }}" name="key" class="form-control search"
                                    value="{{ old('key') }}" placeholder="Masukan Nama Produk..."> <i
                                    class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-xxl-5 ms-auto">
                            <select class="js-example-basic-single" name="category_id" style="width: 100%;"
                                data-placeholder="Pilih Kategori..">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-auto">
                            <div class="hstack gap-2">
                                <button type="submit" class="btn btn-danger"><i
                                        class="ri-equalizer-fill me-1 align-bottom"></i> Filters</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </form>
                <!--end row-->
            </div>
        </div>
        @if ($products->count() == 0)
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane active show" id="productnav-draft" role="tabpanel">
                        <div class="py-4 text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                            </lord-icon>
                            <h5 class="mt-4">Sayang Sekali! Tidak Ada Produk</h5>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row mb-2">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top img-fluid"
                                src="{{ asset('images/product/' . $product->thumbnail()->foto) }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-2">{{ $product->name }}</h4>
                                <p class="card-text text-muted text-wrap">
                                    Rp {{ number_format($product->price, 2) }}</p>
                                <p class="card-text">
                                    <a href="{{ route('produk.show', $product->id) }}"
                                        class="btn btn-success stretched-link">Lihat Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $products->count() }}</span> dari
                    <span class="fw-semibold">{{ $products->total() }}</span> Total
                </div>
                <div>
                    {{ $products->links('admin.layouts.paginate') }}
                </div>
            </div>
        @endif
    </div>
@endsection
