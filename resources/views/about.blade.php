@extends('layouts.base')
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>About Us</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.htm">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- team leader section Start -->
<section class="overflow-hidden">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-5 offset-xl-1">
                <div class="row g-3">
                    <div class="col-md-6">
                        <img src="assets/images/furniture-images/img/3.jpg"
                            class="img-fluid rounded-3 about-image" alt="">
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/furniture-images/img/2.jpg"
                            class="img-fluid rounded-3 about-image" alt="">
                    </div>
                    <div class="col-12 ratio_40">
                        <div>
                            <img src="assets/images/furniture-images/img/1.jpg"
                                class="img-fluid rounded-3 team-image bg-img" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="about-details">
                    <div>
                        <h2>SIAPA KAMI?</h2>
                        <h3>MENGAPA MEMILIH KAMI?</h3>
                        <p>Selamat datang di <b>E-Commerce Layanan Online</b>, 
                            destinasi belanja online terpercaya untuk 
                            kebutuhan gaya hidup dan fashion Anda. Kami berkomitmen untuk 
                            memberikan pengalaman belanja yang menyenangkan dan memuaskan kepada pelanggan kami.</p>
                        <p><b>E-Commerce Layanan Online</b> didirikan dengan tujuan untuk menjadi 
                            pemimpin di industri e-commerce, menyediakan produk berkualitas tinggi dan layanan pelanggan yang unggul.</p>
                        <p>Kami menawarkan beragam produk fashion, aksesori, dan kebutuhan 
                            gaya hidup lainnya dari merek-merek terkemuka. 
                            Dengan koleksi produk yang selalu diperbarui, kami berusaha 
                            memberikan Anda akses ke tren terbaru dan gaya terkini.</p>
                            <a href="{{route('contact.index')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                Contact Us
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection