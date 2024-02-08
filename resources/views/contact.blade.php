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
                <h3>Contact Us</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.htm">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section> <!-- Contact Section Start -->
<section class="contact-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="materialContainer">
                    <div class="material-details">
                        <div class="title title1 title-effect mb-1 title-left">
                            <h2>Hubungi Kami</h2>
                            <p class="ms-0 w-100">Data anda aman pada kami, dan tidak akan di Publikasikan kepada siapapun *</p>
                        </div>
                    </div>
                    <div class="row g-4 mt-md-1 mt-2">
                        <div class="col-md-6">
                            <label for="first" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" id="first" placeholder="Masukan Nama Depan Anda"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="last" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" id="last" placeholder="Masukan Nama Belakang Anda"
                                required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Masukan Gmail Anda" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp"
                                placeholder="Masukan No. WhatsApp anda" required="">
                        </div>

                        <div class="col-12">
                            <label for="comment" class="form-label">Pesan/Komentar</label>
                            <textarea class="form-control" id="comment" rows="5" placeholder="Masukan Pesan/Komentar Anda" required=""></textarea>
                        </div>

                        <div class="col-auto">
                            <button class="btn btn-solid-default" type="submit">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="contact-details">
                    <div>
                        <h2>Hubungi dengan yang lainnya</h2>
                        <h5 class="font-light">Kami bersedia menerima saran atau hanya sekedar mengobrol</h5>
                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="map-pin"></i>
                            </div>
                            <div class="contact-title">
                                <h4>Alamat :</h4>
                                <p>Guluk-Guluk, Sumenep, Madura</p>
                            </div>
                        </div>

                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="phone"></i>
                            </div>
                            <div class="contact-title">
                                <h4>WhatsApp :</h4>
                                <p>+62 85123456789</p>
                            </div>
                        </div>

                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="mail"></i>
                            </div>
                            <div class="contact-title">
                                <h4>Email Address :</h4>
                                <p> timsuksespkl@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection