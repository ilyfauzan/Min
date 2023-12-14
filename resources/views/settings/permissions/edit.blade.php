@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'Permissions'])
@php
    $submit = 'Update';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Update Permission</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('settings.permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
