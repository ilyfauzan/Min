@extends('admin.layouts.app', ['breadcrumbs' => 'Seller', 'sub_breadcrumbs' => 'Store'])
@section('content')
    <div class="card">
        <div class="card-header">{{ $ }}</div>
        <div class="card-body">
            ss
        </div>
    </div>
    <!-- Pengaturan Toko -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Pengaturan Toko</h3>
        </div>
        <div class="block-content">
            <form action="{{ @$store ? route('store.update', $store->id) : route('store.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (@$store)
                    @method('PUT')
                @endif
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            Info penting Toko Anda. Nama Toko Anda akan terlihat oleh publik. </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="one-profile-edit-username">Nama Toko</label>
                            <input type="text" class="form-control" id="one-profile-edit-username" name="name"
                                placeholder="Masukan Nama Toko.." required value="{{ @$store->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="one-profile-edit-name">Deskripsi Toko</label>
                            <textarea class="form-control" name="description" placeholder="Deskripsi Toko" required>{{ @$store->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="one-profile-edit-email">Alamat Toko</label>
                            <textarea class="form-control" name="address" placeholder="Alamat Toko" required>{{ @$store->address }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Logo</label>
                            <div class="mb-4">
                                @if (@$store->logo != null)
                                    <img class="mb-2" width="300" height="400"
                                        src="{{ asset('images/store/' . @$store->logo) }}" alt="logo" />
                                    <br>
                                @else
                                    <img class="img-avatar" src="{{ asset('admin') }}/assets/media/avatars/avatar13.jpg"
                                        alt="">
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="one-profile-edit-avatar" class="form-label">Pilih Logo Baru</label>
                                <input class="form-control" name="logo" accept="image/*" type="file"
                                    id="one-profile-edit-avatar">
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                @if (@$store)
                                    Update
                                @else
                                    Create
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END User Profile -->
@endsection
