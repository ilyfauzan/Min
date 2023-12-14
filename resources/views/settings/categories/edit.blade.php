@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Edit Kategori'])
@php
    $submit = 'Update';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Update Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('settings.categories._form')
                </form>
            </div>
        </div>
    </div>
@endsection
