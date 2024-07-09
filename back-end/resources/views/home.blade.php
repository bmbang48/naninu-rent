@extends('layouts.app')

@section('title','NaNiNu Rent')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide w-100 pt-2 content-cars">

    <div class="carousel-inner">
        <div class="carousel-item carousell active">
            <div class="d-flex carousell-content ">
                <img src="{{asset("images/background/bg-mobil36.jpg")}}" class="d-block img-1" alt="...">
                <img src="{{asset("images/background/bg-mobil35.jpg")}}" class="d-block img-2" alt="...">
            </div>
            <div class=" d-block text-start py-4 px-5">
                <h5>Kondisi Mobil yang Terawat</h5>
                <p>Perawatan mobil meliputi eksterior & interior untuk menjaga penampilan mobil, serta mesin untuk menjaga performa mobil.</p>
            </div>
        </div>
        <div class="carousel-item carousell">
            <div class="d-flex carousell-content">
                <img src="{{asset("images/background/bg-mobil10.jpg")}}" class="d-block img-1" alt="...">
                <img src="{{asset("images/background/bg-mobil27.jpg")}}" class="d-block img-2" alt="...">
            </div>
            <div class=" d-block text-center py-4 px-5">
                <h5>Tersedia Berbagai Jenis Mobil</h5>
                <p>Pilihan mobil yang cukup bervariasi dalam mencakup berbagai kebutuhan pelanggan.</p>
            </div>
        </div>
        <div class="carousel-item carousell">
            <div class="d-flex carousell-content">
                <img src="{{asset("images/background/bg-mobil23.jpg")}}" class="d-block img-1" alt="...">
                <img src="{{asset("images/background/bg-mobil34.jpg")}}" class="d-block img-2" alt="...">
            </div>
            <div class=" d-block text-end py-4 px-5">
                <h5>Driver Berpengalaman</h5>
                <p>Dengan driver berpengalaman dalam menjelajahi medan yang sulit, berkendara jarak jauh menjadi aman dan nyaman.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    <a href="https://wa.me/+6285882759455?text=Hallo%20Admin%20NANINU%20RENT,%20Saya%20ingin%20menanyakan%20ketersediaan%20mobil...">
        <img src="{{asset("images/background/icon-whatsapp-color.png")}}" alt="" class="icon-whatsapp">
    </a>
</div>
@include('cars.index')

<div class="container-fluid about" id="about">
    <div class="row">

        <div class="col-md-4 pt-3 text-center">
            <h4 class="title">Lokasi</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1272867030266!2d106.82094137478363!3d-6.246952561167211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3004d6a5fcf%3A0x7a74f34146102aa6!2sRental%20Mobil%20NaNiNu%20(Naninu%20Rent%20Car)!5e0!3m2!1sen!2sid!4v1713200809474!5m2!1sen!2sid" width="100%" height="400px" class="maps" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-8 pt-3 ps-3 pe-3">
            <h4 class="title text-center">Tentang Kami</h4>
            <p class="description">
                <span>NANINU RENT</span> adalah penyedia layanan sewa mobil yang berjalan sejak 2015 yang beralamat di Jl. Mampang Prapatan V, Jakarta Selatan.
                Terdapat tiga pilihan sewa mobil yaitu Mobil dan Supir (belum termasuk bensin, dll.), All In (Mobil, Supir, Bensin, Parkir, dll.), dan Lepas Kunci.
            </p>
            <ul class="list-unstyled">
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Persyaratan Sewa Pribadi Lepas Kunci
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Wajib memiliki rumah pribadi (tidak ngontrak).</p>
                        <p>2. Survey rumah pribadi, survey dilakukan oleh kami tanpa dikenakan biaya.</p>
                        <p>3. Foto serta Fotocopy KTP pribadi, dan KTP istri atau suami jika sudah menikah</p>
                        <p>4. Foto serta Fotocopy KK.</p>
                        <p>5. Foto serta Fotocopy SIM.</p>
                        <p>6. Membayar lunas sewa mobil sebelum serah terima mobil.</p>
                    </div>
                </li>
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Persyaratan Sewa Perusahaan Lepas Kunci
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Survey Kantor, survey dilakukan oleh kami tanpa dikenakan biaya.</p>
                        <p>2. Foto serta Fotocopy KTP penjamin yang memiliki jabatan manager atau setara.</p>
                        <p>3. Foto serta Fotocopy NPWP penjamin.</p>
                        <p>4. Bersedia menandatangani surat pernyataan yang diberikan oleh rental.</p>
                        <p>5. Membayar lunas sewa mobil sebelum serah terima mobil.</p>
                    </div>
                </li>
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Persyaratan Sewa Dengan Supir
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Survey Kantor, jika pelanggan merupakan perusahaan survey dilakukan oleh kami tanpa dikenakan biaya.</p>
                        <p>2. Foto serta Fotocopy KTP pelanggan atau KTP penjamin jika pelanggan merupakan suatu perusahaan.</p>
                        <p>3. Menanggung penginapan supir jika bertujuan luar kota.</p>
                        <p>4. Membayar lunas sewa mobil sebelum melakukan perjalanan.</p>
                    </div>
                </li>
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Persyaratan Sewa All In
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Foto serta Fotocopy KTP pelanggan.</p>
                        <p>2. Membayar lunas sewa mobil sebelum melakukan perjalanan.</p>
                        <p>3. Harga Sewa All In berbeda-beda tergantung tujuan dan mobil yang disewa.</p>
                    </div>
                </li>
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tata Cara Sewa Mobil
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Tanyakan ketersediaan mobil yang ingin disewa kepada customer service kami.</p>
                        <p>2. Jika mobil tersedia, maka lakukan pemesanan mobil dengan menekan tombol "Pesan Mobil".</p>
                        <p>3. Lengkapi data yang diperlukan, pilih layanan sewa dan waktu sewa. Selanjutnya tekan tombol "Pesan Sekarang".</p>
                        <p>4. Lakukan pembayaran minimal 50% dari total harga agar pesanan anda dapat kami proses.</p>
                        <p>5. Screenshot atau catat No Invoice yang ditampilkan setelah pemesanan, untuk melakukan pembayaran nanti</p>
                        <p>6. Pemesanan dan pembayaran dilakukan paling lambat 2 hari sebelum jadwal sewa.</p>
                    </div>
                </li>
                <li class="py-2 list-about">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tata Cara Pembayaran Sewa Mobil
                    </a>
                    <div class="dropdown-menu col-md-7 p-3">
                        <p>1. Tekan Menu "Bayar Sewa" pada navigasi</p>
                        <p>2. Masukkan No Invoice, lalu tekan cari. Jika no invoice benar maka akan diarahkan ke menu konfirmasi pembayaran.</p>
                        <p>3. Masukkan nominal bayar (50% dari total harga atau lebih)</p>
                        <p>4. Upload Bukti Pembayaran.</p>
                        <p>5. Tambahkan keterangan, nama pemilik rekening atau bank pengirim.</p>
                        <p>6. Tekan tombol "Konfirmasi", lalu screenshot hasil konfirmasi pembayaran.</p>
                    </div>
                </li>
            </ul>
            <div class="sosmed ">

                <a href="https://www.instagram.com/naninurentcar/" class="d-flex align-items-center text-decoration-none">
                    <img src="{{asset("images/background/icon-instagram.png")}}" alt="">
                    <h4 class="title pt-3">Instagram</h4>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection