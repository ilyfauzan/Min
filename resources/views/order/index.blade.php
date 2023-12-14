@extends('admin.layouts.app', ['breadcrumbs' => !request()->is('order-pembeli') ? 'Penjual' : 'Pembeli', 'sub_breadcrumbs' => 'Daftar Pesanan'])

@section('content')
    <div class="card ">
        <div class="card-header  border-0">
            <div class="d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">Daftar Pesanan</h5>
            </div>
        </div>
        <div class="card-body border border-dashed border-end-0 border-start-0">
            <form action="{{ route('orders.index') }}" method="GET">

                <div class="row g-3">
                    <div class="col-xxl-4 col-sm-6">
                        <div class="search-box">
                            <input name="key" type="text" class="form-control search"
                                placeholder="Cari No Order, pelanggan, status pesanan, atau lainnya...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->
                    {{-- <div class="col-xxl-2 col-sm-4">
                        <div>
                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y"
                                data-range-date="true" id="demo-datepicker" placeholder="Select date">
                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">

                        </div>
                    </div> --}}
                    <!--end col-->
                    <div class="col-xxl-3 col-sm-6">
                        <div>
                            <select name="status" class="form-select js-example-basic-single mb-3"
                                aria-label="Default select example" data-placeholder="Pilih Status..">
                                <option></option>
                                <option value="1">Dalam Pengemasan Toko</option>
                                <option value="2">Dalam Pengirim Toko</option>
                                <option value="3">Selesai</option>
                                <option value="4">Gagal</option>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <!--end col-->
                    <div class="col-xxl-2 col-sm-6">
                        <div>
                            <button type="submit" class="btn btn-primary w-100"> <i
                                    class="ri-equalizer-fill me-1 align-bottom"></i>
                                Filters
                            </button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 2%;">No</th>
                            <th class="text-center" style="width: 10%;">No Order</th>
                            <th class="text-center" style="width: 8%;">Tanggal Order</th>
                            <th class="text-center" style="width: 8%;">Total</th>
                            <th class="text-center" style="width: 10%;">Status Pengiriman</th>
                            <th class="text-center" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key=> $order)
                            <tr>
                                <td class="text-center">{{ $orders->firstItem() + $key }}</td>
                                <td class="text-center">{{ $order->no_order }}</td>
                                <td class="text-center">{{ $order->created_at->format('d/m/Y') }}</td>
                                <td class="text-end">Rp {{ number_format($order->total, 2) }}</td>
                                <td class="text-center">
                                    @if ($order->status == 1)
                                        <span class="badge text-bg-secondary">Dalam Pengemasan Toko</span>
                                    @elseif ($order->status == 2)
                                        <span class="badge text-bg-secondary">Dalam Pengirim Toko</span>
                                    @elseif ($order->status == 3)
                                        <span class="badge text-bg-success">Selesai</span>
                                    @else
                                        <span class="badge text-bg-danger">Gagal</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Lihat
                                        Invoice</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($orders->count() == 0)
                @include('layouts.not-found', ['message' => 'Belum ada daftar order'])
            @endif
        </div>
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $orders->count() }}</span> dari <span
                            class="fw-semibold">{{ $orders->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $orders->links('admin.layouts.paginate') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Default Modals -->
    <div id="modal-update" class="modal fade" tabindex="-1" aria-labelledby="modal-update" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-update">Update Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="no_order">No Order</label></div>
                        <div class="col-md-8">
                            <input type="text" name="no_order" id="no_order" disabled class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label for="statu">Status</label></div>
                        <div class="col-md-8">
                            <select class="form-select form-select-edit mb-3" aria-label="Default select example">
                                <option value="1">Dalam Pengemasan Toko</option>
                                <option value="2">Dalam Pengirim Toko</option>
                                <option value="3">Selesai</option>
                                <option value="4">Gagal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update" class="btn btn-primary ">Update Pengiriman</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script type="text/javascript">
        function openModal(id) {
            swal.fire({
                title: "Apa kamu yakin menghapus ini ?",
                text: "Jika sudah terhapus tidak dapat di kembalikan lagi !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-danger m-1",
                    cancelButton: "btn btn-secondary m-1",
                },
                confirmButtonText: "Yes, delete it!",
            }).then(function(e) {
                if (e.value === true) {
                    $("#form-delete-" + id).submit();
                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            });
        }
    </script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-order.init.js"></script>
    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('velzon/assets/') }}/libs/@simonwep/pickr/pickr.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/form-pickers.init.js"></script>

    <!-- init js -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/form-pickers.init.js"></script>
@endsection
