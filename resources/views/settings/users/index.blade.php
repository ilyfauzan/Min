@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'User'])
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h2>Users Management</h2>
                {{-- <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td class="text-center">{{ $data->firstItem() + $key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $role)
                                        <span class="badge badge-soft-primary">{{ $role }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="link-success fs-15"><i
                                        class="ri-pencil-fill fs-16"></i></a>
                                {{-- <a type="button" onclick="openModal({{ $user->id }})"
                                    class="delete-confirm link-danger fs-15"><i class="ri-delete-bin-5-fill fs-16"></i></a> --}}

                                <form method="POST" id="form-delete-{{ $user->id }}"
                                    action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="align-items-center row g-3 text-center text-sm-start">
                <div class="col-sm">
                    <div class="text-muted">Menampilkan<span class="fw-semibold"> {{ $data->count() }}</span> dari <span
                            class="fw-semibold">{{ $data->total() }}</span> Hasil
                    </div>
                </div>
                <div class="col-sm-auto">
                    {{ $data->links('admin.layouts.paginate') }}
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
