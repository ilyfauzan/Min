@extends('admin.layouts.app', ['breadcrumbs' => 'Admin', 'sub_breadcrumbs' => 'Ubah Tanggal Pesanan'])

@section('content')
    {{-- <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div> --}}
    <div class="card ">
        <div class="card-header  border-0">
            <div class="d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">Ubah Tanggal Pesanan</h5>
            </div>
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
                                {{-- <td>{{ $order->carts->product->name }}</td> --}}
                                {{-- <td></td> --}}
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
                                    <button onclick="openmodalUpdatePengiriman({{ $order->id }})" type="button"
                                        class="btn btn-sm btn-warning">Update Tanggal</button>

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
                            <input class="form-control" type="date" name="created_at" id="created_at">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update" class="btn btn-primary ">Update Tanggal</button>
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

        async function openmodalUpdatePengiriman(id) {

            $.ajax({
                url: `/show-order/${id}`,
                type: "GET",
                cache: false,
                success: function(response) {
                    console.log(response);
                    //fill data to form
                    $('#no_order').val(response.no_order);
                    $('#id').val(response.id);
                    var created_at = new Date(response.created_at);
                    console.log(dateFormat(created_at));
                    $('#created_at').val(dateFormat(response.created_at)).change();

                    // //open modal
                    $('#modal-update').modal('show');
                }
            });
        }
        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id = $('#id').val();
            let created_at = $('#created_at').val();
            let token = $("meta[name='csrf-token']").attr("content");

            if (created_at == '') {
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Tanggal Harus Diisi !!</h4><p class="text-muted mx-4 mb-0">Periksa jawaban anda dan coba lagi !</p></div></div>',
                    showCancelButton: !0,
                    showConfirmButton: !1,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "Oke",
                    buttonsStyling: !1,
                    showCloseButton: !0
                });
                return;
            }
            //ajax
            $.ajax({

                url: `/orders-ubah-tanggal/${id}`,
                type: "PUT",
                cache: false,
                data: {
                    "id": id,
                    "created_at": created_at,
                    "_token": token
                },
                success: function(response) {
                    //show success message
                    console.log(response);
                    $('#modal-update').modal('hide');
                    let seconds = 2;

                    const makeIteration = () => {
                        console.clear();
                        if (seconds > 0) {
                            console.log(seconds);
                            $(".text-edit").text("Halaman akan reload dalam " + seconds + " detik");
                            seconds -= 1;
                            setTimeout(makeIteration, 1000); // 1 second waiting
                        } else {
                            window.location.reload();
                        }
                    };

                    setTimeout(makeIteration, 1000);
                    Swal.fire({
                        html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Order berhasil diperbaharui !</h4><p class="text-muted mx-4 mb-0 text-edit"></p></div></div>',
                        showCancelButton: !0,
                        showConfirmButton: !1,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Back",
                        buttonsStyling: !1,
                        showCloseButton: !0
                    });

                    // setTimeout(function() {

                    // }, 5000);
                    //close modal

                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Ada sesuatu yang salah !</h4><p class="text-muted mx-4 mb-0">Periksa console dan coba lagi !</p></div></div>',
                        showCancelButton: !0,
                        showConfirmButton: !1,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Okee",
                        buttonsStyling: !1,
                        showCloseButton: !0
                    });
                }

            });

        });
    </script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-order.init.js"></script>
    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('velzon/assets/') }}/libs/@simonwep/pickr/pickr.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/form-pickers.init.js"></script>

    <!-- init js -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/form-pickers.init.js"></script>
@endsection
