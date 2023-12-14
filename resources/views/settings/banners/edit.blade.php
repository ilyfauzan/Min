@extends('admin.layouts.app', ['breadcrumbs' => 'Pengaturan', 'sub_breadcrumbs' => 'Edit Banner'])
@php
    $submit = 'Update';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Edit Banner</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('settings.banners._form')
                </form>
            </div>
        </div>
    </div>
@endsection
