@extends('admin.layouts.app')
@section('content')
    <!-- Quick Overview -->
    <div class="row">
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="{{ route('produk.create') }}">
                <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-success">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-success mb-0">
                        Add New
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-danger">{{ $out_of_stock }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-danger mb-0">
                        Out of stock
                    </p>
                </div>
            </a>
        </div>
        {{-- <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_dashboard.html">
                <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-dark">260</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                        New
                    </p>
                </div>
            </a>
        </div> --}}
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-dark">{{ $products->count() }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                        All Products
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Overview -->

    <!-- All Products -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">All Products</h3>
            {{-- <div class="block-options">
                <div class="dropdown">
                    <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Filters <i class="fa fa-angle-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            New
                            <span class="badge bg-success rounded-pill">260</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Out of Stock
                            <span class="badge bg-danger rounded-pill">24</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            All
                            <span class="badge bg-primary rounded-pill">14503</span>
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Ditambahkan </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>PD {{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-end"> {{ number_format($product->price, 2) }}</td>
                            <td class="text-center"> {{ number_format($product->stok) }}</td>
                            <td class="text-center">
                                @if ($product->stok > 0)
                                    <span class="badge bg-success">Tersedia</span>
                                @else
                                    <span class="badge bg-danger">Habis </span>
                                @endif
                            </td>
                            <td class="text-center">{{ $product->created_at->format('d/m/Y') }}</td>
                            <td class="text-center fs-sm">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('produk.edit', $product->id) }}"
                                    data-bs-toggle="tooltip" title="View">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-bs-toggle="tooltip"
                                    title="Delete">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tbody>
                    <tr>
                        <td class="text-center fs-sm">1</td>
                        <td class="fw-semibold fs-sm">Brian Stevens</td>
                        <td class="fs-sm">customer1@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">2</td>
                        <td class="fw-semibold fs-sm">Henry Harrison</td>
                        <td class="fs-sm">customer2@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">3</td>
                        <td class="fw-semibold fs-sm">Danielle Jones</td>
                        <td class="fs-sm">customer3@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">5 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">4</td>
                        <td class="fw-semibold fs-sm">Ralph Murray</td>
                        <td class="fs-sm">customer4@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">6 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">5</td>
                        <td class="fw-semibold fs-sm">Lisa Jenkins</td>
                        <td class="fs-sm">customer5@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">6</td>
                        <td class="fw-semibold fs-sm">Ralph Murray</td>
                        <td class="fs-sm">customer6@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">7</td>
                        <td class="fw-semibold fs-sm">David Fuller</td>
                        <td class="fs-sm">customer7@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">10 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">8</td>
                        <td class="fw-semibold fs-sm">Justin Hunt</td>
                        <td class="fs-sm">customer8@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">5 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">9</td>
                        <td class="fw-semibold fs-sm">Justin Hunt</td>
                        <td class="fs-sm">customer9@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">10</td>
                        <td class="fw-semibold fs-sm">Adam McCoy</td>
                        <td class="fs-sm">customer10@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">11</td>
                        <td class="fw-semibold fs-sm">Ryan Flores</td>
                        <td class="fs-sm">customer11@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">3 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">12</td>
                        <td class="fw-semibold fs-sm">Carol Ray</td>
                        <td class="fs-sm">customer12@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">10 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">13</td>
                        <td class="fw-semibold fs-sm">Amber Harvey</td>
                        <td class="fs-sm">customer13@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">14</td>
                        <td class="fw-semibold fs-sm">Andrea Gardner</td>
                        <td class="fs-sm">customer14@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">10 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">15</td>
                        <td class="fw-semibold fs-sm">David Fuller</td>
                        <td class="fs-sm">customer15@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">4 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">16</td>
                        <td class="fw-semibold fs-sm">Susan Day</td>
                        <td class="fs-sm">customer16@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">17</td>
                        <td class="fw-semibold fs-sm">Jack Estrada</td>
                        <td class="fs-sm">customer17@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">18</td>
                        <td class="fw-semibold fs-sm">Albert Ray</td>
                        <td class="fs-sm">customer18@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">8 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">19</td>
                        <td class="fw-semibold fs-sm">Ralph Murray</td>
                        <td class="fs-sm">customer19@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">20</td>
                        <td class="fw-semibold fs-sm">Amber Harvey</td>
                        <td class="fs-sm">customer20@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">4 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">21</td>
                        <td class="fw-semibold fs-sm">Henry Harrison</td>
                        <td class="fs-sm">customer21@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">6 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">22</td>
                        <td class="fw-semibold fs-sm">Brian Stevens</td>
                        <td class="fs-sm">customer22@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">4 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">23</td>
                        <td class="fw-semibold fs-sm">Lori Grant</td>
                        <td class="fs-sm">customer23@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">24</td>
                        <td class="fw-semibold fs-sm">Henry Harrison</td>
                        <td class="fs-sm">customer24@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">25</td>
                        <td class="fw-semibold fs-sm">Helen Jacobs</td>
                        <td class="fs-sm">customer25@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">26</td>
                        <td class="fw-semibold fs-sm">Melissa Rice</td>
                        <td class="fs-sm">customer26@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">5 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">27</td>
                        <td class="fw-semibold fs-sm">Marie Duncan</td>
                        <td class="fs-sm">customer27@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">8 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">28</td>
                        <td class="fw-semibold fs-sm">Jose Wagner</td>
                        <td class="fs-sm">customer28@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">8 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">29</td>
                        <td class="fw-semibold fs-sm">Adam McCoy</td>
                        <td class="fs-sm">customer29@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">5 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">30</td>
                        <td class="fw-semibold fs-sm">Lori Grant</td>
                        <td class="fs-sm">customer30@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">6 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">31</td>
                        <td class="fw-semibold fs-sm">Ralph Murray</td>
                        <td class="fs-sm">customer31@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">32</td>
                        <td class="fw-semibold fs-sm">Jack Greene</td>
                        <td class="fs-sm">customer32@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">33</td>
                        <td class="fw-semibold fs-sm">Laura Carr</td>
                        <td class="fs-sm">customer33@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">3 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">34</td>
                        <td class="fw-semibold fs-sm">Melissa Rice</td>
                        <td class="fs-sm">customer34@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">35</td>
                        <td class="fw-semibold fs-sm">Betty Kelley</td>
                        <td class="fs-sm">customer35@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">36</td>
                        <td class="fw-semibold fs-sm">Alice Moore</td>
                        <td class="fs-sm">customer36@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">2 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">37</td>
                        <td class="fw-semibold fs-sm">Susan Day</td>
                        <td class="fs-sm">customer37@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">7 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">38</td>
                        <td class="fw-semibold fs-sm">Jack Greene</td>
                        <td class="fs-sm">customer38@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">5 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">39</td>
                        <td class="fw-semibold fs-sm">Carol Ray</td>
                        <td class="fs-sm">customer39@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center fs-sm">40</td>
                        <td class="fw-semibold fs-sm">Lori Moore</td>
                        <td class="fs-sm">customer40@example.com</td>
                        <td>
                            <span
                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                        </td>
                        <td>
                            <span class="text-muted fs-sm">9 days ago</span>
                        </td>
                    </tr>
                </tbody> --}}
            </table>
        </div>
    </div>
    <!-- END All Products -->
@endsection
