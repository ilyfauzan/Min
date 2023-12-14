@extends('layouts.app')
@section('title')
    User
@endsection
@section('content')
    <!-- account area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>1 .</span>
                                        <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true"
                                            href="#my-account-1">Edit informasi akun Anda
                                        </a>
                                    </h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <form action="{{ route('user.update', auth()->user()->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="myaccount-info-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>
                                                        Informasi Akun Saya
                                                    </h4>
                                                    <h5>
                                                        Detail Pribadi Anda
                                                    </h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nama</label>
                                                            <input type="text" value="{{ auth()->user()->name }}"
                                                                name="name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email
                                                            </label>
                                                            <input type="email" value="{{ auth()->user()->email }}"
                                                                name="email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>No Telepon</label>
                                                            <input type="number" name="no_telepon"
                                                                value="{{ auth()->user()->no_telepon }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i>
                                                            back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="400">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>2 .</span>
                                        <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false"
                                            href="#my-account-2">Ubah kata sandi Anda
                                        </a>
                                    </h3>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4> Ganti kata sandi</h4>
                                                <h5> Kata Sandi Anda</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password</label>
                                                        <input type="password" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password
                                                            Confirm</label>
                                                        <input type="password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="icon-arrow-up-circle"></i>
                                                        back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="600">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>3 .</span>
                                        <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false"
                                            href="#my-account-3">Modify your address book
                                            entries
                                        </a>
                                    </h3>
                                </div>
                                <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>
                                                    Address Book Entries
                                                </h4>
                                            </div>
                                            <div class="entries-wrapper">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="entries-info text-center">
                                                            <p>Jone Deo</p>
                                                            <p>hastech</p>
                                                            <p>
                                                                28 Green
                                                                Tower,
                                                            </p>
                                                            <p>
                                                                Street Name.
                                                            </p>
                                                            <p>
                                                                New York
                                                                City,
                                                            </p>
                                                            <p>USA</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="entries-edit-delete text-center">
                                                            <a class="edit" href="#">Edit</a>
                                                            <a href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="icon-arrow-up-circle"></i>
                                                        back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">
                                                        Continue
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account m-0" data-aos="fade-up"
                                data-aos-delay="800">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>4 .</span>
                                        <a href="wishlist.html">Modify your wish list
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account area end -->
@endsection
