@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Kategori'])
@section('content')
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">List Kategori</h4>
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Tambah Kategori</a>
        </div>
        <!-- end card header -->
        <div class="card-body">
            <!-- Bordered Tables -->
            <table class="table data-table table-bordered table-nowrap">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.edit', $item->id) }}" class="link-success fs-15"><i
                                        class="ri-pencil-fill fs-16"></i></a>
                                <a type="button" onclick="openModal({{ $item->id }})"
                                    class="delete-confirm link-danger fs-15"><i class="ri-delete-bin-5-fill fs-16"></i></a>

                                <form method="POST" id="form-delete-{{ $item->id }}"
                                    action="{{ route('categories.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- end card-body -->
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $categories->count() }}</span> dari
                        <span class="fw-semibold">{{ $categories->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $categories->links('admin.layouts.paginate') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end card -->
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
@endsection
