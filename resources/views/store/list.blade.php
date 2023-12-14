@extends('layouts.main', ['title' => 'Toko'])
@section('content')
    <div class="d-flex mt-2 justify-content-center">
        <h1>Toko</h1>
    </div>
    <div class="row mb-1">
        @foreach ($stores as $store)
            <div class="col-xxl-4 col-lg-6">
                <div class="card">
                    <div>
                        <div class="avatar-title mt-1 rounded" style="background-color: white">
                            @if ($store->logo != null)
                                <img class="mb-2" src="{{ asset('images/store/' . $store->logo) }}" alt="logo"
                                    height="100" />
                            @else
                                <img src="{{ asset('velzon/img/') }}/icon.png" alt="" height="100">
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $store->name }}</h4>
                        <p class="card-text text-muted text-wrap">{{ $store->description }}</p>
                        <p class="card-text">
                            <a href="{{ route('store.show', $store->id) }}" class="btn btn-success stretched-link">Jelajahi
                                Toko</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $stores->links('admin.layouts.paginate') }}
    </div>
@endsection
