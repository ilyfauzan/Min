@extends('admin.layouts.app', ['sub_breadcrumbs' => 'Dashboard'])
@section('content')
    <div class="row mb-3 pb-1">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-2">
            <div class="flex-grow-1">
                <h4 class="fs-16 mb-1">Selamat {{ $time }}, {{ auth()->user()->name }}!</h4>
            </div>
        </div><!-- end card header -->
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0"> Toko</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>

                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white">{{ $store->count() }}</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                    <i class="bx bx-store-alt text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0">CUSTOMERS</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white">{{ $user->count() - 1 }}</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-user-circle text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6">
                <!-- card -->
                <div class="card card-animate bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-white text-truncate mb-0">Produk</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white">{{ $product->count() }}</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx  bx bx-package text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <!--end col-->
    </div>
@endsection
