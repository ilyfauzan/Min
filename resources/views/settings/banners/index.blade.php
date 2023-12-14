@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Banner'])
@section('content')
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Daftar Banner</h4>
            <a class="btn btn-success" href="{{ route('banners.create') }}"> Tambah Banner</a>
        </div>
        <!-- end card header -->
        <div class="card-body">
            <!-- Bordered Tables -->
            <div class="table-responsive">
                <table class="table data-table table-bordered table-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Gambar</th>
                            {{-- <th class="text-center" style="width: 10%;">Label</th> --}}
                            <th class="text-center" style="width: 15%;">Judul</th>
                            <th class="text-center" style="width: 30%;">Deskripsi</th>
                            {{-- <th class="text-center" style="width: 20%;">Link Url</th> --}}
                            <th class="text-center" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('images/banner/' . $item->image) }}" alt="image" width="200px"
                                        height="100px">
                                </td>
                                {{-- <td>{{ $item->label }}</td> --}}
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                {{-- <td>{{ $item->url }}</td> --}}
                                <td class="text-center">
                                    <a href="{{ route('banners.edit', $item->id) }}" class="link-success fs-15"><i
                                            class="ri-pencil-fill fs-16"></i></a>
                                    <a type="button" onclick="openModal({{ $item->id }})"
                                        class="delete-confirm link-danger fs-15"><i
                                            class="ri-delete-bin-5-fill fs-16"></i></a>

                                    <form method="POST" id="form-delete-{{ $item->id }}"
                                        action="{{ route('banners.destroy', $item->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end card-body -->
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $banners->count() }}</span> dari <span
                            class="fw-semibold">{{ $banners->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $banners->links('admin.layouts.paginate') }}
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
