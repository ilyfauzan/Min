@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Buat Toko Baru'])
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Buat Toko Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('store._form')
                </form>
            </div>
        </div>
    </div>
@endsection
