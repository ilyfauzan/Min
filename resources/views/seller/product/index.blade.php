@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Daftar Produk'])
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Daftar Produk</h4>
                <a class="btn btn-success" href="{{ route('products.create') }}"> Tambahkan Produk Baru</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ditambahkan </th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
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
                                    <a href="{{ route('products.edit', $product->id) }}" class="link-success fs-15"><i
                                            class="ri-pencil-fill fs-16"></i></a>
                                    <a type="button" onclick="openModal({{ $product->id }})"
                                        class="delete-confirm link-danger fs-15"><i
                                            class="ri-delete-bin-5-fill fs-16"></i></a>

                                    <form method="POST" id="form-delete-{{ $product->id }}"
                                        action="{{ route('products.destroy', $product->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($products->count() == 0)
                @include('layouts.not-found', ['message' => 'Tidak ada produk yang ditampilkan !'])
            @endif
        </div>
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $products->count() }}</span> dari
                        <span class="fw-semibold">{{ $products->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $products->links('admin.layouts.paginate') }}
                </div>
            </div>
        </div>
    </div>
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
                confirmButtonText: "Ya, hapus itu!",
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
@endsection
