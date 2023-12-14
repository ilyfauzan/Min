@extends('layouts.main', ['title' => 'Register'])
@section('content')
    <div class="d-flex mt-2 justify-content-center">
        <div class="col-lg-5">
            <div class="alert alert-warning alert-borderless" role="alert">
                <strong> Pastikan Email dan No Telepon Benar !! </strong> <br>
                Nanti digunakan untuk pemberitahuan orderan !
            </div>
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="p-lg-5 p-4">
                            <div class="text-center mt-1">
                                <h5 class="text-primary">Buat akun baru
                                </h5>
                                <p class="text-muted">Dapatkan akun gratis Anda sekarang !</p>
                            </div>

                            <div class="mt-4">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" value="{{ old('name', @$permission->name) }}" required
                                            class="form-control  @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Input Nama">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" value="{{ old('email', @$permission->email) }}" required
                                            class="form-control  @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Input Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">No Telepon</label>
                                        <input type="number" value="{{ old('no_telepon', @$permission->no_telepon) }}"
                                            required class="form-control  @error('no_telepon') is-invalid @enderror"
                                            id="no_telepon" name="no_telepon" placeholder="08xxxxxxx">
                                        @error('no_telepon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" class="form-control pe-5 password-input"
                                                placeholder="Enter password" id="password-input">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password_confirmation"
                                                class="form-control pe-5 password-input" placeholder="Enter password"
                                                id="password_confirmation">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-info w-100" type="submit">Register</button>
                                    </div>

                                </form>
                            </div>

                            <div class="mt-5 text-center">
                                <p class="mb-0">Sudah Memiliki Akun ? <a href="{{ route('login') }}"
                                        class="fw-semibold text-primary text-decoration-underline"> Login</a> </p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
@endsection
