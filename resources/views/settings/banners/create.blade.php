@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Tambah Banner'])
@php
    $submit = 'Create';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Banner</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('settings.banners._form')
                </form>
            </div>
        </div>
    </div>
@endsection
