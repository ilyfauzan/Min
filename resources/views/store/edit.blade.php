@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Update Toko'])
@section('content')
    @if (!$store->is_active)
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Toko Anda Tutup, </strong> toko tidak dapat menerima orderan
            untuk
            sementara waktu !
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Perbaharui Toko</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.update', $store->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('store._form')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $store->is_active ? 'Tutup' : 'Buka' }} Toko</h4>
                </div>
                <div class="card-body">
                    @if ($store->is_active)
                        <p>Toko akan ditutup sementara, toko anda tidak akan mendapatkan orderan sampai anda mengaktifkan
                            kembali toko anda.</p>
                    @else
                        <p>Toko akan dibuka, maka toko anda akan mendapatkan orderan.</p>
                    @endif
                    <form id="form-active" action="{{ route('store.active', $store->id) }}" method="post">
                        @csrf
                        <button class="btn btn-{{ $store->is_active ? 'danger' : 'success' }}"
                            onclick="activeStore({{ $store->id }})" id="active-store"
                            type="button">{{ $store->is_active ? 'Tutup' : 'Buka' }} Toko</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var is_active = {{ $store->is_active }};
        if (is_active == 1) {
            var html =
                '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Toko Akan Ditutup !</h4><p class="text-muted mx-4 mb-0">Toko anda tidak akan menerima pesanan lagi !</p></div></div>';
            var confirmButtonText = "Yes, Tutup Toko!";
        } else {
            var html =
                '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Toko Akan Dibuka !</h4><p class="text-muted mx-4 mb-0">Toko anda akan mulai menerima pesanan !</p></div></div>';
            var confirmButtonText = "Yes, Buka Toko!";
        }

        function activeStore(id) {
            swal.fire({
                html: html,
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
                confirmButtonText: confirmButtonText,
                cancelButtonClass: "btn btn-danger w-xs mb-1",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then(function(e) {
                if (e.value === true) {
                    $("#form-active").submit();
                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            });
        }
    </script>
@endsection
