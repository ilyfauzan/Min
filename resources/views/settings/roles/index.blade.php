@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Role'])
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Daftar Role</h4>
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Tambah Role</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center" width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td class="text-center">{{ $roles->firstItem() + $key }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('roles.edit', $role->id) }}" class="link-success fs-15"><i
                                    class="ri-pencil-fill fs-16"></i></a>
                            <a type="button" onclick="openModal({{ $role->id }})"
                                class="delete-confirm link-danger fs-15"><i class="ri-delete-bin-5-fill fs-16"></i></a>

                            <form method="POST" id="form-delete-{{ $role->id }}"
                                action="{{ route('roles.destroy', $role->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $roles->count() }}</span> dari <span
                            class="fw-semibold">{{ $roles->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $roles->links('admin.layouts.paginate') }}
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
