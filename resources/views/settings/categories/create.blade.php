@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Tambah Kategori'])
@php
    $submit = 'Create';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    @include('settings.categories._form')
                </form>
            </div>
        </div>
    </div>
@endsection
