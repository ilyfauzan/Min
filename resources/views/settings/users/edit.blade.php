@extends('admin.layouts.app', ['breadcrumbs' => 'Settings', 'sub_breadcrumbs' => 'User'])
@php
    $submit = 'Update';
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
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                @include('settings.users._form')
            </form>
        </div>
    </div>
@endsection
