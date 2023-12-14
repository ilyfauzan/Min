@extends('layouts.main', ['title' => 'Checkout'])
@section('content')
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-info" type="button" role="tab"
                                        aria-controls="pills-bill-info" aria-selected="true">
                                        <i
                                            class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                        Data Diri
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3" id="pills-bill-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-address" type="button" role="tab"
                                        aria-controls="pills-bill-address" aria-selected="false">
                                        <i
                                            class="ri-truck-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                        Pengiriman
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3" id="pills-payment-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-payment" type="button" role="tab"
                                        aria-controls="pills-payment" aria-selected="false">
                                        <i
                                            class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                        Pembayaran
                                    </button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3" id="pills-finish-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-finish" type="button" role="tab"
                                        aria-controls="pills-finish" aria-selected="false">
                                        <i
                                            class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                        Finish
                                    </button>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Informasi Data Diri</h5>
                                    <p class="text-muted mb-4">Silakan isi semua informasi di bawah ini</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">Nama Lengkap</label>
                                                <input type="text" disabled class="form-control"
                                                    id="billinginfo-firstName" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="billinginfo-email"
                                                    value="{{ auth()->user()->email }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="billinginfo-phone"
                                                    value="{{ auth()->user()->no_telepon }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="billinginfo-address" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control   @error('alamat') is-invalid @enderror"" id="billinginfo-address"
                                            placeholder="Alamat ..." rows="3"></textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="billinginfo-address" class="form-label">Pesan</label>
                                        <textarea name="note" class="form-control" id="billinginfo-address" placeholder="Note ..." rows="3"></textarea>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 mt-3">
                                        <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                            data-nexttab="pills-bill-address-tab">
                                            <i class="ri-truck-line label-icon align-middle fs-16 ms-2"></i>Lanjutkan ke
                                            Pengiriman
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                                aria-labelledby="pills-bill-address-tab">
                                <div>
                                    <h5 class="mb-1">Informasi Pengiriman</h5>
                                    <p class="text-muted mb-4">Silakan isi semua informasi di bawah ini</p>
                                </div>

                                <div class="mt-4">
                                    <div class="mt-4">
                                        <h5 class="fs-14 mb-3">Metode Pengiriman</h5>

                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod01" value="0" name="type_delivery"
                                                        type="radio" class="form-check-input">
                                                    <label class="form-check-label" for="shippingMethod01">
                                                        <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Rp
                                                            5,000.00</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">
                                                            Standar</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Perkiraan
                                                            Pengiriman 1 sampai 2 hari</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod02" value="1" name="type_delivery"
                                                        type="radio" class="form-check-input" checked>
                                                    <label class="form-check-label" for="shippingMethod02">
                                                        <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Rp
                                                            10,000.00</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">Express</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Perkiraan
                                                            Pengiriman 1 hari</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-info-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kembali ke
                                        Data Diri</button>
                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-payment-tab"><i
                                            class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Lanjutkan ke
                                        Pembayaran</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                aria-labelledby="pills-payment-tab">
                                <div>
                                    <h5 class="mb-1">Pilihan Pembayaran</h5>
                                    <p class="text-muted mb-4">Harap pilih dan masukkan informasi penagihan Anda</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod01" name="paymentMethod" type="radio"
                                                    class="form-check-input" disabled>
                                                <label class="form-check-label" for="paymentMethod01">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-bank-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Transfer Bank</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod03" name="paymentMethod" type="radio"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="paymentMethod03">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-money-dollar-box-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Cash on Delivery</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kembali ke
                                        Pengiriman</button>
                                    <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab"><i
                                            class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>
                                        Selesaikan Order</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-finish" role="tabpanel"
                                aria-labelledby="pills-finish-tab">
                                <div class="text-center py-5">

                                    <div class="mb-4">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                            colors="primary:#695eef,secondary:#73dce9" style="width:120px;height:120px">
                                        </lord-icon>
                                    </div>
                                    <h5>Terima kasih ! Pesanan Anda Selesai!</h5>
                                    <p class="text-muted">Anda akan menerima email konfirmasi pesanan dengan rincian Anda
                                        memesan.</p>

                                    {{-- <h3 class="fw-semibold">Order ID: <a href="apps-ecommerce-order-details.html"
                                            class="text-decoration-underline">VZ2451</a></h3> --}}
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Ringkasan Pesanan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 30%;">Produk</th>
                                    <th style="width: 40%;">Nama</th>
                                    <th style="width: 30%;" class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <div class="avatar-md bg-light rounded p-1">
                                                <img src="{{ asset('images/product/' . $cart->product->thumbnail()->foto) }}"
                                                    alt="image-{{ $cart->id }}" class="img-fluid d-block">
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-14"><a href="apps-ecommerce-product-details.html"
                                                    class="text-dark">{{ $cart->product->name }}</a></h5>
                                            <p class="text-muted mb-0">Rp {{ number_format($cart->product->price, 2) }} x
                                                {{ $cart->quantity }}</p>
                                        </td>
                                        <td class="text-end">Rp
                                            {{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="fw-semibold" colspan="2">Sub Total :</td>
                                    <td class="fw-semibold text-end">Rp {{ number_format($carts->sum('total'), 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Biaya pengiriman :</td>
                                    <td class="text-end">
                                        <span id="biaya-pengiriman">
                                            Rp 10,000.00
                                        </span>
                                    </td>
                                </tr>
                                <tr class="table-active">
                                    <th colspan="2">Total :</th>
                                    <td class="text-end">
                                        <span id="total">
                                            Rp 10,000.00
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <!-- init js -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-product-checkout.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('velzon/assets/') }}/js/app.js"></script>
    <script>
        var total = {{ $carts->sum('total') }};
        $('#total').text(moneyFormatRupiah(10000 + total));
        $("input[name='type_delivery']").click(function() {
            var value = $('input[name="type_delivery"]:checked').val();
            if (value == 0) {
                $('#biaya-pengiriman').text("Rp 5,000.0");
                $('#total').text(moneyFormatRupiah(5000 + total));
            } else {
                $('#total').text(moneyFormatRupiah(10000 + total));
                $('#biaya-pengiriman').text("Rp 10,000.0");
            }
        });
    </script>
@endsection
