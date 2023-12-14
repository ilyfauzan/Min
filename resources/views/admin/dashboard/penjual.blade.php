@extends('admin.layouts.app', ['sub_breadcrumbs' => 'Dashboard'])
@section('content')
    <div class="row mb-3 pb-1">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-2">
            <div class="flex-grow-1">
                <h4 class="fs-16 mb-1">Selamat {{ $time }}, {{ auth()->user()->name }}!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0"> Pendapatan</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-white fs-14 mb-0">
                                    {{-- 0.00 % --}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white">
                                    Rp {{ number_format($orders->sum('total'), 2) }}</h4>
                                {{-- <a href="" class="text-decoration-underline">View net earnings</a> --}}
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-dollar-circle text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0">Orders</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-white fs-14 mb-0">
                                    {{-- 0.00 % --}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white">{{ $orders->count() }}</h4>
                                {{-- <a href="" class="text-decoration-underline">View all orders</a> --}}
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-shopping-bag text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0">Produk</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-white fs-14 mb-0">
                                    {{-- 0.00 % --}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary text-white mb-4">{{ $products->count() }} </h4>
                                {{-- <a href="" class="text-decoration-underline">See details</a> --}}
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-package text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-semibold text-white mb-0">Stok Habis</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-white fs-14 mb-0">
                                    {{-- 00.00 % --}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white text-white">{{ $out_of_stock }}
                                </h4>

                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-shopping-bag text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->
        </div>
    </div>
@endsection
