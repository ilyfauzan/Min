@extends('layouts.main', ['title' => 'Login'])
@section('content')
    <div class="d-flex mt-2 justify-content-center">
        <div class="col-lg-5">
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="p-lg-5 p-4">
                            <div class="text-center">
                                <h5 class="text-primary">Selamat Datang Kembali !</h5>
                                <p class="text-muted">Silahkan Login Untuk Berbelanja di Zanshop.</p>
                            </div>

                            <div class="mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" value="{{ old('email', @$permission->email) }}" required
                                            class="form-control  @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Input Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="#" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
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

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-info w-100" type="submit">Login</button>
                                    </div>

                                </form>
                            </div>

                            <div class="mt-5 text-center">
                                <p class="mb-0">Belum Memiliki Akun ? <a href="{{ route('register') }}"
                                        class="fw-semibold text-primary text-decoration-underline"> Register</a> </p>
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
