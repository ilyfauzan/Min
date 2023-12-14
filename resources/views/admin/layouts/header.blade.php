 <header id="page-topbar">
     <div class="layout-width">
         <div class="navbar-header">
             <div class="d-flex">
                 <!-- LOGO -->
                 <div class="navbar-brand-box horizontal-logo">
                     <a href="{{ route('home') }}" class="logo logo-dark">
                         <span class="logo-sm">
                             <img src="{{ asset('velzon/img/icon.png') }}" height="22" alt="logo">
                         </span>
                         <span class="logo-lg">
                             <img src="{{ asset('velzon/img/icon.png') }}" height="50" alt="logo">
                         </span>
                     </a>
                     <a href="{{ route('home') }}" class="logo logo-light">
                         <span class="logo-sm">
                             <img src="{{ asset('velzon/img/icon.png') }}" height="22" alt="logo">
                         </span>
                         <span class="logo-lg">
                             <img src="{{ asset('velzon/img/icon.png') }}" height="45" alt="logo">
                         </span>
                     </a>
                 </div>

                 <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                     id="topnav-hamburger-icon">
                     <span class="hamburger-icon">
                         <span></span>
                         <span></span>
                         <span></span>
                     </span>
                 </button>

                 <!-- App Search-->
                 <form class="app-search d-none d-md-block">
                     <div class="position-relative">
                         <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                             id="search-options" value="">
                         <span class="mdi mdi-magnify search-widget-icon"></span>
                         <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                             id="search-close-options"></span>
                     </div>
                 </form>
             </div>

             <div class="d-flex align-items-center">

                 <div class="ms-1 header-item d-none d-sm-flex">
                     <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                         data-toggle="fullscreen">
                         <i class='bx bx-fullscreen fs-22'></i>
                     </button>
                 </div>

                 <div class="ms-1 header-item d-none d-sm-flex">
                     <button type="button"
                         class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                         <i class='bx bx-moon fs-22'></i>
                     </button>
                 </div>

                 <div class="dropdown ms-sm-3 header-item topbar-user">
                     <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="d-flex align-items-center">
                             {{-- <img class="rounded-circle header-profile-user"
                                 src="{{ asset('velzon/assets/') }}/images/users/avatar-1.jpg" alt="Header Avatar"> --}}
                             <div class="avatar-md">
                                 <div class="avatar-title rounded bg-soft-info text-info">
                                     @php
                                         function initials($str)
                                         {
                                             $ret = '';
                                             foreach (explode(' ', $str) as $word) {
                                                 $ret .= strtoupper($word[0]);
                                             }
                                             return $ret;
                                         }

                                         echo initials(auth()->user()->name);
                                     @endphp
                                 </div>
                             </div>
                             <span class="text-start ms-xl-2">
                                 <span
                                     class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{ auth()->user()->name }}</span>
                                 @foreach (auth()->user()->getRoleNames() as $role)
                                     <span
                                         class="d-none d-xl-block ms-1 fs-13 text-muted user-name-sub-text">{{ $role }}</span>
                                 @endforeach
                             </span>
                         </span>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                         <!-- item-->
                         <h6 class="dropdown-header">Welcome {{ auth()->user()->name }} !</h6>
                         <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                 class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                 class="align-middle">Profile</span></a>
                         <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                 class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                 class="align-middle" data-key="t-logout">Logout</span></a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>

 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <!-- Dark Logo-->
         <a href="{{ route('home') }}" class="logo logo-dark">
             <span class="logo-sm">
                 <img src="{{ asset('velzon/img/icon.png') }}" height="22" alt="logo">
             </span>
             <span class="logo-lg">
                 <img src="{{ asset('velzon/img/icon.png') }}" height="17" alt="logo">

             </span>
         </a>
         <!-- Light Logo-->
         <a href="{{ route('home') }}" class="logo logo-light">
             <span class="logo-sm">
                 <img src="{{ asset('velzon/img/icon.png') }}" height="22" alt="logo">
             </span>
             <span class="logo-lg">
                 <img src="{{ asset('velzon/img/icon.png') }}" height="17" alt="logo">

                 {{-- <img src="{{ asset('velzon/assets/') }}/images/logo-light.png" alt="" height="17"> --}}
             </span>
         </a>
         <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
             id="vertical-hover">
             <i class="ri-record-circle-line"></i>
         </button>
     </div>

     <div id="scrollbar">
         <div class="container-fluid">

             <div id="two-column-menu">
             </div>
             <ul class="navbar-nav" id="navbar-nav">
                 <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Dashboard</span>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link menu-link {{ request()->is('dashboard*') ? 'active' : '' }}"
                         href="{{ route('dashboard') }}">
                         <i class="ri-dashboard-line"></i> <span data-key="t-widgets">Dashboard</span>
                     </a>
                 </li>
                 @role('Admin')
                     <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pengaturan</span>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link menu-link {{ request()->is('roles*', 'users*', 'permissions*', 'banners*', 'categories*', 'settings*') ? 'active' : '' }}"
                             aria-haspopup="true" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                             aria-expanded=" {{ request()->is('roles*', 'users*', 'permissions*', 'banners*', 'categories*', 'settings*') ? 'true' : 'false' }}"
                             aria-controls="sidebarPages">
                             <i class="bx bx-cog"></i> <span data-key="t-pages">Pengaturan</span>
                         </a>
                         <div class="collapse menu-dropdown {{ request()->is('roles*', 'users*', 'permissions*', 'banners*', 'categories*', 'settings*') ? 'show' : '' }}"
                             id="sidebarPages">
                             <ul class="nav nav-sm flex-column">
                                 <li class="nav-item">
                                     <a href="{{ route('users.index') }}"
                                         class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
                                         data-key="t-starter">
                                         User </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('roles.index') }}"
                                         class="nav-link {{ request()->is('roles*') ? 'active' : '' }}"
                                         data-key="t-starter">
                                         Role </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('categories.index') }}"
                                         class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                                         data-key="t-starter">
                                         Kategori </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @endrole
                 @role(['Penjual', 'Pembeli'])
                     <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Penjual</span>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link menu-link {{ request()->is('store*', 'products*', 'orders*') ? 'active' : '' }} {{ request()->routeIs('orders.laporan') ? 'active' : '' }}"
                             aria-haspopup="true" href="#sidebarSeller" data-bs-toggle="collapse" role="button"
                             aria-expanded=" {{ request()->is('store*', 'products*', 'orders*') ? 'true' : 'false' }}"
                             aria-controls="sidebarSeller">
                             <i class="bx bx-store"></i> <span data-key="t-pages">Toko</span>
                         </a>
                         <div class="collapse menu-dropdown {{ request()->is('store*', 'products*', 'orders*') ? 'show' : '' }} {{ request()->routeIs('orders.laporan') ? 'show' : '' }}"
                             id="sidebarSeller">
                             <ul class="nav nav-sm flex-column">
                                 <li class="nav-item">
                                     <a href="{{ route('store.index') }}"
                                         class="nav-link {{ request()->is('store*') ? 'active' : '' }}"
                                         data-key="t-starter">
                                         Pengaturan Toko </a>
                                 </li>
                                 @hasrole('Penjual')
                                     <li class="nav-item">
                                         <a href="{{ route('products.index') }}"
                                             class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                                             data-key="t-starter">
                                             Produk </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{ route('orders.index') }}"
                                             class="nav-link {{ request()->is('orders*') ? 'active' : '' }}"
                                             data-key="t-starter">
                                             Daftar Pesanan </a>
                                     </li>
                                 @endhasrole
                             </ul>
                         </div>
                     </li>
                     <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pembeli</span>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link menu-link {{ request()->is('order-pembeli') ? 'active' : '' }}"
                             aria-haspopup="true" href="#sidebarbuyyer" data-bs-toggle="collapse" role="button"
                             aria-expanded=" {{ request()->is('order-pembeli') ? 'true' : 'false' }}"
                             aria-controls="sidebarbuyyer">
                             <i class="bx bx-store"></i> <span data-key="t-pages">Pesanan</span>
                         </a>
                         <div class="collapse menu-dropdown {{ request()->is('order-pembeli') ? 'show' : '' }}"
                             id="sidebarbuyyer">
                             <ul class="nav nav-sm flex-column">
                                 <li class="nav-item">
                                     <a href="{{ route('order.pembeli') }}"
                                         class="nav-link {{ request()->is('order-pembeli') ? 'active' : '' }}"
                                         data-key="t-starter">
                                         Daftar Pesanan Saya </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @endrole
                 <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Profile</span>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link menu-link {{ request()->is('profile*') ? 'active' : '' }}"
                         aria-haspopup="true" href="#sidebarProfile" data-bs-toggle="collapse" role="button"
                         aria-expanded=" {{ request()->is('profile*') ? 'true' : 'false' }}"
                         aria-controls="sidebarProfile">
                         <i class="bx bx-cog"></i> <span data-key="t-pages">Profile</span>
                     </a>
                     <div class="collapse menu-dropdown {{ request()->is('profile*') ? 'show' : '' }}"
                         id="sidebarProfile">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="{{ route('profile.index') }}"
                                     class="nav-link {{ request()->is('profile*') ? 'active' : '' }}"
                                     data-key="t-starter">
                                     Profile </a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
 <!-- Left Sidebar End -->
