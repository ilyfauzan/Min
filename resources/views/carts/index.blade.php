@extends('layouts.main', ['title' => 'Keranjang'])
@section('content')
    <div class="d-flex justify-content-center mb-1">
        <h1>Keranjang Saya</h1>
    </div>
    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="row align-items-center gy-3 mb-3">
                <div class="col-sm">
                    <div>
                        <h5 class="fs-14 mb-0">Keranjang Kamu ({{ $carts->count() }} items)</h5>
                    </div>
                </div>
            </div>
            <form action="{{ route('checkout') }}" id="form-checkout" method="post">
                @csrf
                @forelse ($carts as $cart)
                    <div class="card product @if (!$cart->product->store->is_active) border card-border-danger @endif">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <img src="{{ asset('images/product/' . $cart->product->thumbnail()->foto) }}"
                                            alt="" class="img-fluid d-block">
                                        {{-- src="{{ asset('images/store/' . $store->logo) }}" --}}
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-14 text-truncate"><a href="{{ route('produk.show', $cart->product->id) }}"
                                            class="text-dark">{{ $cart->product->name }}</a></h5>
                                    <h5 class="fs-14 text-truncate"><a
                                            href="{{ route('store.show', $cart->product->store->id) }}"
                                            class="text-dark">Toko
                                            : {{ $cart->product->store->name }}</a></h5>
                                    @if (!$cart->product->store->is_active)
                                        <h5 class="text-danger"><strong>Toko Tutup !</strong> Silahkan Hapus Produk Dari
                                            Keranjang</h5>
                                    @else
                                        <div class="input-step">
                                            <button type="button" onclick="minus({{ $cart->id }})"
                                                class="quantity-minus-{{ $cart->id }}">-</button>
                                            <input name="quantity[]" type="number" id="{{ $cart->id }}"
                                                class="product-quantity quantity" value="{{ $cart->quantity }}"
                                                min="0" max="100">
                                            <button type="button" onclick="plus({{ $cart->id }})"
                                                class="quantity-plus">+</button>
                                        </div>
                                        <h5 class="fs-14 text-truncate mt-2"><span class="text-success">Tersisa
                                                : {{ $cart->product->stok }}
                                                {{ $cart->product->category_id == 2 ? 'Ekor' : 'Kg' }}</span></h5>
                                    @endif
                                </div>
                                <input type="hidden" value="{{ $cart->product->price }}" id="price-{{ $cart->id }}">
                                <input type="hidden" value="{{ $cart->product->stok }}" id="stok-{{ $cart->id }}">
                                <input type="hidden" value="{{ $cart->id }}" name="id[]">
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Harga
                                            {{ $cart->product->category_id == 2 ? 'Per Ekor' : 'Per Kg' }}:</p>
                                        <h5 class="fs-14">Rp <span id="ticket_price"
                                                class="product-price">{{ number_format($cart->product->price, 2) }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <a type="button" onclick="openModal({{ $cart->id }})"
                                                class="d-block text-body p-1 px-2"><i
                                                    class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Total :</div>
                                        <h5 class="fs-14 mb-0"> <span class="total-price-{{ $cart->id }}">Rp
                                                {{ number_format($cart->product->price * $cart->quantity, 2) }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    <!-- end card -->
                    {{-- <form action="{{ route('cart.destroy', $cart->id) }}" method="post" id="destroy-{{ $cart->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <form action="{{ route('adjustment_quantity') }}" method="post" id="plus-{{ $cart->id }}">
                        @csrf
                        <input type="hidden" value="plus" name="type">
                        <input type="hidden" value="{{ $cart->id }}" name="id">
                    </form>
                    <form action="{{ route('adjustment_quantity') }}" method="post" id="minus-{{ $cart->id }}">
                        @csrf
                        <input type="hidden" value="minus" name="type">
                        <input type="hidden" value="{{ $cart->id }}" name="id">
                    </form> --}}
                @empty
                    @include('layouts.not-found', [
                        'message' => 'Keranjang kamu kosong, Ayo segera checkout barang pilihanmu !',
                    ])
                @endforelse
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                <div class="text-end mb-4">
                    {{-- <a @if ($carts->count() > 0) href="{{ route('checkout') }}"  @else href="javascript:void(0)" @endif
                        id="checkout" class="btn btn-success btn-label right ms-auto"><i
                            class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a> --}}
                    <button type="button" id="checkout"
                        class="btn @if ($carts->count() == 0) disabled @endif btn-success btn-label right ms-auto"><i
                            class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</button>
                </div>
            </form>

        </div>
        <!-- end col -->

    </div>
    <form method="POST" id="form-delete">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    </form>
    <input type="hidden" id="close_store" value="{{ $close_store }}">
@endsection
@section('script')
    <script>
        function destroy(id) {
            $("#destroy-" + id).submit();
        }

        function plus(id) {
            // $("#plus-" + id).submit();
            var value = $("#" + id).val();
            var stok = $("#stok-" + id).val();
            var price = $("#price-" + id).val();
            if (parseInt(value) < parseInt(stok)) {
                $("#" + id).val(parseInt(value) + 1);
                var total = (parseInt(value) + 1) * parseInt(price);
                $('.total-price-' + id).text(moneyFormatRupiah(total));
            }
        }

        function minus(id) {
            var value = $("#" + id).val();
            var price = $("#price-" + id).val();

            if (value > 0) {
                $("#" + id).val(parseInt(value) - 1);
                var total = (parseInt(value) - 1) * parseInt(price);
                $('.total-price-' + id).text(moneyFormatRupiah(total));
            }
            // $("#minus-" + id).submit();
        }

        $(document).on('input', '.quantity', function() {
            var input = $(this);
            var id = input.attr('id');
            var value = input.val();
            var price = $("#price-" + id).val();
            var stok = $("#stok-" + id).val();
            if (parseInt(value) > parseInt(stok)) {
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Maaf...! Stok tidak ada !</h4><p class="text-muted mx-4 mb-0">Silahkan tulis ulang jumlah pesanan anda</p></div></div>',
                    showCancelButton: !0,
                    showConfirmButton: !1,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "OKE",
                    buttonsStyling: !1,
                    showCloseButton: !0
                });
                $('#checkout').addClass('disabled');
            } else $('#checkout').removeClass('disabled');
            if (value == '') {
                $("#" + id).val(0);
            }
            var total = value * price;
            $('.total-price-' + id).text(moneyFormatRupiah(total));
        });

        async function openModal(id) {
            await $("#form-delete").prop('action', '/cart/' + id);
            modal();
        }
        $("#checkout").on("click", function() {
            var close_store = $("#close_store").val();
            if (close_store != 0) {
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Produk Tidak Tersedia !</h4><p class="text-muted mx-4 mb-0">Silahkan hapus produk terlebih dahulu dan coba lagi !</p></div></div>',
                    showCancelButton: !0,
                    showConfirmButton: !1,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "Oke",
                    buttonsStyling: !1,
                    showCloseButton: !0
                });
                return;
            }
            $("#form-checkout").submit();
        });

        function modal() {
            swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Apa kamu yakin menghapus ini ?</h4><p class="text-muted mx-4 mb-0">Jika sudah terhapus tidak dapat di kembalikan lagi !</p></div></div>',
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                customClass: {
                    confirmButton: "btn btn-danger m-1",
                    cancelButton: "btn btn-secondary m-1",
                },
                confirmButtonText: "Ya, hapus!",
            }).then(function(e) {
                if (e.value === true) {
                    $("#form-delete").submit();
                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            });
        }
    </script>
    <!-- input step init -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/form-input-spin.init.js"></script>
    {{-- <script src="{{ asset('/js/cart/index.js') }}"></script> --}}

    <!-- ecommerce cart js -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-cart.init.js"></script>
@endsection
