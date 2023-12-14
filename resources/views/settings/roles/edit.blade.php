@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'Edit Role', 'submit' => 'Update'])
@php
    $submit = 'Update';
@endphp
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Edit Role {{ $role->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('settings.roles._form')
                </form>
            </div>
        </div>
    </div>
@endsection
