@extends('layouts.main', ['title' => 'Tentang Kami'])
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="bg-soft-secondary position-relative">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h3>Tentang Kami</h3>
                        </div>
                    </div>
                    <div class="shape">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none"
                            viewBox="0 0 1440 60">
                            <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z"
                                    style="fill: var(--vz-card-bg-custom);"></path>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1001">
                                    <rect width="1440" height="60" fill="#ffffff"></rect>
                                </mask>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="card-body p-4">
                    {{-- <div>
                        <h5>Selamat datang di Zanshop!</h5>
                        <p class="text-muted">Zanshop adalah platform belanja online terdepan di Asia Tenggara dan Taiwan.
                        </p>
                    </div> --}}

                    <div class="text-justify">
                        {{-- <h5>Tentang</h5>
                        <p class="text-muted text-justify" style="text-align: justify;">Zanshop adalah mobile-platform
                            pertama di Asia Tenggara
                            (Indonesia,
                            Filipina,
                            Malaysia, Singapura, Thailand, Vietnam) dan Taiwan yang menawarkan transaksi jual beli online
                            yang menyenangkan, gratis, dan terpercaya. Bergabunglah dengan jutaan pengguna lainnya dengan
                            mulai mendaftarkan produk jualan dan berbelanja berbagai penawaran menarik kapan saja, di mana
                            saja. Keamanan transaksi kamu terjamin.. Ayo gabung dalam komunitas Zanshop dan mulai belanja
                            sekarang!</p> --}}
                        <h5>Zanshop: Membawa Kemajuan Jualan Produk Online dan Segala Hal Dizaman Millenial</h5>
                        <p class="text-muted text-justify" style="text-align: justify;">
                            <strong>Pendahuluan</strong>
                            <br>
                            Zaman milenial, yang ditandai dengan kemajuan teknologi dan konektivitas yang luar biasa, telah memberikan dampak signifikan terhadap berbagai aspek kehidupan manusia. Salah satu perubahan paling mencolok adalah transformasi cara orang berbelanja dan bertransaksi, yang semakin beralih ke ranah digital. Toko online menjadi salah satu manifestasi nyata dari revolusi perdagangan ini, membawa kemajuan yang tak terelakkan dalam dunia bisnis di era milenial.

Dengan kehadiran toko online, konsep berbelanja telah mengalami metamorfosis yang mengagumkan. Masyarakat kini dapat mengakses berbagai produk dan layanan secara mudah dan efisien hanya dengan ujung jari mereka. Fenomena ini bukan hanya sebatas perubahan perilaku konsumen, tetapi juga mewakili pergeseran paradigma dalam lingkup bisnis, di mana pelaku usaha harus beradaptasi dengan era digital untuk tetap bersaing.
                            <br>
                            <br>
                            <strong>Cara Kerja Zanshop</strong>
                            <br>
                            <br>
                            <strong>1. Pendaftaran Akun</strong>
                            <br>
                            Langkah pertama yang harus dilakukan oleh penjual adalah mendaftarkan akun di website Zanshop. Mereka dapat mengisi data diri, informasi tentang produk yang mereka jual, serta harga yang ditawarkan.
                            <br>
                            <strong>2. Katalog Produk Online</strong>
                            <br>
                            Zanshop menyediakan katalog yang lengkap dengan berbagai jenis produk, termasuk pakaian, kendaraan, alat elektronik, dan lainnya. Setiap produk memiliki deskripsi lengkap dan gambar untuk membantu pembeli dalam memilih produk yang diinginkan.
                            <br>
                            <strong>3. Pemesanan dan Pembayaran</strong>
                            <br>
                            Pembeli dapat dengan mudah memilih produk yang ingin dibeli melalui website Zanshop. Setelah memilih produk, mereka dapat menambahkan ke keranjang belanja dan melanjutkan proses pembayaran melalui sistem pembayaran yang aman dan terpercaya.
                            <br>
                            <strong>4. Pengiriman dan Penerimaan</strong>
                            <br>
                            Pembeli dapat dengan mudah memilih produk yang ingin dibeli melalui website Zanshop. Setelah memilih produk, mereka dapat menambahkan ke keranjang belanja dan melanjutkan proses pembayaran melalui sistem pembayaran yang aman dan terpercaya.
                            <br>
                            <strong> 5. Evaluasi dan Ulasan</strong>
                            <br>
                            Setelah menerima produk, pembeli dapat memberikan ulasan dan penilaian terhadap kualitas produk
                            dan layanan yang mereka terima. Ulasan ini akan membantu membangun kepercayaan dan kualitas
                            layanan di platform Zanshop.
                            <br>
                            <br>
                            <strong>Manfaat Zanshop bagi Penjual</strong>
                            <br>
                            <br>
                            <strong>Menghubungkan dengan Pasar yang Lebih Luas:</strong> Melalui Zanshop, penjual dapat mengakses pasar yang lebih luas di dalam dan luar negeri, membantu meningkatkan daya saing dan peluang penjualan produk mereka.
                            <br>
                            <strong>Peningkatan Pendapatan:</strong> Dengan akses ke pasar yang lebih luas, penjual berpeluang meningkatkan pendapatan mereka dan memperbaiki kesejahteraan ekonomi keluarga.
                            <br>
                            <strong>Promosi Produk dan Profil Penjual:</strong> Zanshop menyediakan platform untuk mempromosikan produk dan profil penjual, membantu meningkatkan eksposur dan daya tarik bagi pembeli.
                            <br>
                            <strong> Transaksi Aman dan Terpercaya:</strong> Dengan sistem pembayaran online yang aman,
                            transaksi antara
                            penjual dan pembeli dijamin keamanannya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
