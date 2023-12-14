@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'Tambah Role'])
@php
    $submit = 'Create';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    @include('settings.roles._form')
                </form>
            </div>
        </div>
    </div>
@endsection
