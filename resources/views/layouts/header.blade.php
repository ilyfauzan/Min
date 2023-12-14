   <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
       <div class="container-fluid custom-container">
           <a class="navbar-brand" href="{{ route('home') }}">
               <div class="d-flex justify-content-center align-items-center">
                   <img src="{{ asset('velzon/img/') }}/icon.png" class="card-logo card-logo-dark" alt="logo dark"
                       height="30">
                   <h4 class="mr-3">Zanshop</h4>
               </div>
           </a>
           <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
               <i class="mdi mdi-menu"></i>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                   <li class="nav-item">
                       <a class="nav-link fw-normal {{ request()->is('/') ? 'active' : '' }}"
                           href="{{ route('home') }}">Home</a>
                   </li>
                   {{-- <li class="nav-item">
                       <a class="nav-link fw-normal" href="#process">Kategori</a>
                   </li> --}}
                   <li class="nav-item">
                       <a class="nav-link fw-normal  {{ request()->is('toko*') ? 'active' : '' }}"
                           href="{{ route('store.list') }}">Toko</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link fw-normal  {{ request()->is('produk*') ? 'active' : '' }}"
                           href="{{ route('produk.index') }}">Produk</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link fw-normal {{ request()->is('about*') ? 'active' : '' }}"
                           href="{{ route('about') }}">Tentang Kami</a>
                   </li>
               </ul>
               @auth
                   @php
                       $count_cart = App\Models\Cart::where('user_id', auth()->user()->id)
                           ->where('status', 0)
                           ->count();
                       $carts = App\Models\Cart::where('user_id', auth()->user()->id)
                           ->with('product')
                           ->where('status', 0)
                           ->latest()
                           ->get();
                       foreach ($carts as $cart) {
                           $cart->total = $cart->quantity * $cart->product->price;
                       }
                   @endphp
                   <div class="dropdown topbar-head-dropdown me-2 header-item">
                       <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                           id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                           aria-haspopup="true" aria-expanded="false">
                           <i class='bx bx-shopping-bag fs-22'></i>
                           <span
                               class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">{{ $count_cart }}</span>
                       </button>
                       <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart"
                           aria-labelledby="page-header-cart-dropdown">
                           <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                               <div class="row align-items-center">
                                   <div class="col">
                                       <h6 class="m-0 fs-16 fw-semibold"> Keranjang Saya</h6>
                                   </div>
                                   <div class="col-auto">
                                       <span class="badge badge-soft-success fs-13"><span
                                               class="cartitem-badge">{{ $count_cart }}</span>
                                           items</span>
                                   </div>
                               </div>
                           </div>
                           <div data-simplebar style="max-height: 300px;">
                               <div class="p-2">
                                   @if ($count_cart < 1)
                                       <div class="text-center empty-cart" id="empty-cart">
                                           <div class="avatar-md mx-auto my-3">
                                               <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                                                   <i class='bx bx-cart'></i>
                                               </div>
                                           </div>
                                           <h5 class="mb-3">Keranjang Masih Kosong!</h5>
                                           <a href="{{ route('produk.index') }}" class="btn btn-success w-md mb-3">Belanja
                                               Sekarang</a>
                                       </div>
                                   @else
                                       @foreach ($carts as $cart)
                                           <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                               <div class="d-flex align-items-center">
                                                   <img src="{{ asset('images/product/' . $cart->product->thumbnail()->foto) }}"
                                                       class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                                   <div class="flex-1">
                                                       <h6 class="mt-0 mb-1 fs-14">
                                                           <a href="apps-ecommerce-product-details.html"
                                                               class="text-reset">{{ $cart->product->name }}</a>
                                                       </h6>
                                                       <p class="mb-0 fs-12 text-muted">
                                                           Jumlah: <span>{{ $cart->quantity }} x Rp
                                                               {{ number_format($cart->product->price, 2) }}</span>
                                                       </p>
                                                   </div>
                                                   <div class="px-2">
                                                       <h5 class="m-0 fw-normal">Rp<span class="cart-item-price">
                                                               {{ number_format($cart->product->price * $cart->quantity, 2) }}</span>
                                                       </h5>
                                                   </div>
                                                   {{-- <div class="ps-2">
                                                       <button type="button"
                                                           class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                               class="ri-close-fill fs-16"></i></button>
                                                   </div> --}}
                                               </div>
                                           </div>
                                       @endforeach
                                   @endif
                               </div>
                           </div>
                           @if ($count_cart > 0)
                               <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border"
                                   id="checkout-elem">
                                   <div class="d-flex justify-content-between align-items-center pb-3">
                                       <h5 class="m-0 text-muted">Total:</h5>
                                       <div class="px-2">
                                           <h5 class="m-0" id="cart-item-total">Rp
                                               {{ number_format($carts->sum('total'), 2) }}</h5>
                                       </div>
                                   </div>

                                   <a href="{{ route('cart.index') }}" class="btn btn-primary text-center w-100">
                                       Tampilkan Keranjang Belanja
                                   </a>
                               </div>
                           @endif
                       </div>
                   </div>
               @endauth
               <div class="">
                   @auth
                       <a href="{{ route('dashboard') }}" class="btn btn-soft-primary"><i
                               class="ri-apps-line align-bottom me-1"></i> Dashboard</a>
                       <a class="btn btn-soft-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                               class=" ri-logout-circle-line align-bottom me-1"></i><span class="align-middle"
                               data-key="t-logout">Logout</span></a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   @else
                       <a href="{{ route('login') }}" class="btn btn-soft-primary"><i
                               class="ri-user-3-line align-bottom me-1"></i> Login & Register</a>
                   @endauth
               </div>
           </div>

       </div>
   </nav>
   <!-- end navbar -->
