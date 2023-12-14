@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'User'])
@php
    $submit = 'Create';
@endphp
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Create New User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                @include('settings.users._form')
            </form>
        </div>
    </div>
@endsection
