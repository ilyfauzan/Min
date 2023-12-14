@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'Permissions'])
@php
    $submit = 'Create';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Create New Permission</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    @include('settings.permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
