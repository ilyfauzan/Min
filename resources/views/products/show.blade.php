@extends('layouts.main', ['title' => 'Produk'])
@section('content')
    @if ($produk->store->is_active == 0)
        <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Toko {{ $produk->store->name }} Tutup, </strong> produk tidak
            tersedia
            untuk sementara waktu !
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row gx-lg-5">
                <div class="col-xl-4 col-md-8 mx-auto">
                    <div class="product-img-slider sticky-side-div">
                        <div
                            class="swiper product-thumbnail-slider p-2 rounded bg-light swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-dc1078a071f3a70bd" aria-live="polite"
                                style="transform: translate3d(0px, 0px, 0px);">
                                <div class="swiper-slide swiper-slide-active" role="group"
                                    aria-label="1 / {{ $photos->count() + 1 }}" style="width: 284px; margin-right: 24px;">
                                    <img src="{{ asset('images/product/' . $produk->thumbnail()->foto) }}" alt=""
                                        class="img-fluid d-block">
                                </div>
                                @foreach ($photos as $key => $photo)
                                    <div class="swiper-slide @if ($key == 0) swiper-slide-next @endif "
                                        role="group" aria-label="{{ $key + 2 }} / {{ $photos->count() + 1 }}"
                                        style="width: 284px; margin-right: 24px;">
                                        <img src="{{ asset('images/product/' . $photo->foto) }}" alt=""
                                            class="img-fluid d-block">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                aria-controls="swiper-wrapper-dc1078a071f3a70bd" aria-disabled="false"></div>
                            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                aria-label="Previous slide" aria-controls="swiper-wrapper-dc1078a071f3a70bd"
                                aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- end swiper thumbnail slide -->
                        <div
                            class="swiper product-nav-slider mt-2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                            <div class="swiper-wrapper" id="swiper-wrapper-453d10c6010adfdad5" aria-live="polite"
                                style="transform: translate3d(0px, 0px, 0px);">
                                <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                    role="group" aria-label="1 / {{ $photos->count() + 1 }}"
                                    style="width: 67.5px; margin-right: 10px;">
                                    <div class="nav-slide-item ">
                                        <img src="{{ asset('images/product/' . $produk->thumbnail()->foto) }}"
                                            alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                                @foreach ($photos as $key => $photo)
                                    <div class="swiper-slide swiper-slide-visible @if ($key == 0) swiper-slide-next @endif "
                                        role="group" aria-label="{{ $key + 2 }} / {{ $photos->count() + 1 }}"
                                        style="width: 67.5px; margin-right: 10px;">
                                        <img src="{{ asset('images/product/' . $photo->foto) }}" alt=""
                                            class="img-fluid d-block">
                                    </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- end swiper nav slide -->
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-8">
                    <div class="mt-xl-0 mt-5">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>{{ $produk->name }}</h4>
                                <h5>Toko : {{ $produk->store->name }}</h5>
                                {{-- <div class="hstack gap-3 flex-wrap">
                                    <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                    <div class="vr"></div>
                                    <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic
                                            Fashion</span></div>
                                    <div class="vr"></div>
                                    <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar,
                                            2021</span></div>
                                </div> --}}
                            </div>
                            <div class="flex-shrink-0">

                                <form method="POST" action="{{ route('produk.addtocart') }}">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                    <input type="hidden" name="quantity" value="1" />
                                    <button type="submit"
                                        class="btn  @if ($produk->store->is_active == 0) disabled @endif btn-primary"><i
                                            class="ri-add-fill "></i>
                                        Keranjang</button>
                                </form>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-5 col-sm-6">
                                <div class="p-2 border border-dashed rounded">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2">
                                            <div class="avatar-title rounded bg-transparent text-info fs-24">
                                                <i class="ri-money-dollar-circle-fill"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-1">Harga : Rp {{ number_format($produk->price, 2) }}
                                            </p>
                                            <h5 class="mb-0"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-muted">
                            <h5 class="fs-14">Jenis :</h5>
                            <p>{{ $produk->jenis }}</p>
                            <h5 class="fs-14">Stok :</h5>
                            <p>{{ $produk->stok }}</p>
                            <h5 class="fs-14">Deskripsi :</h5>
                            <p>{{ $produk->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end card body -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('velzon/assets/') }}/libs/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-product-details.init.js"></script>
@endsection
