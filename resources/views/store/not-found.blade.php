@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Pengaturan Toko'])
@section('content')
    <div class="card rounded-0 bg-soft-success border-top">
        <div class="px-4">
            <div class="row">
                <div class="col-xxl-5 align-self-center">
                    <div class="py-4">
                        <h4 class="display-6 coming-soon-text">Toko Belum Ada </h4>
                        <p class="text-success fs-15 mt-3">Kamu belum memiliki toko, dilahkan buat sekarang !</p>
                        <div class="hstack flex-wrap gap-2">
                            <a class="btn btn-primary" href="{{ route('store.create') }}">Buat Toko</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 ms-auto">
                    <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                        <img src="{{ asset('velzon/assets/') }}/images/faq-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
@endsection
