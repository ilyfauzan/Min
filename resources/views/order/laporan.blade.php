@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Laporan Penjualan'])
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Laporan Penjualan</h4>
        </div>
        <div class="card-body">
            <form id="form-cetak" target="_blank" action="{{ route('orders.cetak') }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-2"><label for="tanggal">Tanggal</label></div>
                    <div class="col-md-2"><input class="form-control" type="date" name="date_from" id="date_from"></div>
                    <div class="col-md-1">sampai</div>
                    <div class="col-md-2"><input class="form-control" type="date" name="date_to" id="date_to"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-2"><label for="status">Status</label></div>
                    <div class="col-md-4"> <select name="status" class="form-select js-example-basic-single mb-3"
                            aria-label="Default select example" data-placeholder="Pilih Status..">
                            <option></option>
                            <option value="1">Dalam Pengemasan Toko</option>
                            <option value="2">Dalam Pengirim Toko</option>
                            <option value="3">Selesai</option>
                            <option value="4">Gagal</option>
                        </select></div>
                </div>
                <div class="mb-2">
                    <div class="col-md-2">
                        <button type="button" onclick="cetak()" class="btn btn-success"><i
                                class="ri-file-download-line align-bottom me-1"></i>
                            Cetak Laporan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        console.log('cek');

        function openModalError() {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Tanggal Masih Kosong !</h4><p class="text-muted mx-4 mb-0">Silahkan isi tanggal secara lengkap dan coba lagi !</p></div></div>',
                showCancelButton: !0,
                showConfirmButton: !1,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Oke",
                buttonsStyling: !1,
                showCloseButton: !0
            });
        }

        function cetak() {
            var date_from = $("#date_from").val();
            var date_to = $("#date_to").val();
            console.log([date_from, date_to]);
            if (date_from != '') {
                if (date_to == '') {
                    openModalError();
                    return;
                }
            }
            if (date_to != '') {
                if (date_from == '') {
                    openModalError();
                    return;
                }
            }
            $("#form-cetak").submit();
        }
    </script>
@endsection
