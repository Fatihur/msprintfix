@extends('beranda.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('drivin/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown">Print Your Ideas with MS
                                        Print</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('drivin/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown">High Quality Printing
                                        Services</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End --><!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-print text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Fast Printing</h5>
                                <span>Cetak dengan cepat dan kualitas terbaik di MS Print.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-tint text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>High Quality Ink</h5>
                                <span>Kami menggunakan tinta berkualitas tinggi untuk hasil cetakan yang tajam dan tahan
                                    lama.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Professional Service</h5>
                                <span>Layanan profesional dan ramah untuk semua kebutuhan cetak Anda.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('drivin/img/about-1.png') }}"
                            alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                            src="{{ asset('drivin/img/about-2.png') }}" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">Tentang Kami</h6>
                        <h1 class="display-6 mb-4">MS Print: Solusi Cetak Terbaik Anda</h1>
                        <p>MS Print adalah penyedia layanan cetak berkualitas tinggi dengan harga terjangkau. Kami
                            berkomitmen untuk memberikan hasil cetak yang memuaskan dan sesuai dengan kebutuhan Anda.</p>
                        <p class="mb-4">Dari cetak dokumen, foto, hingga berbagai macam merchandise, MS Print siap
                            memenuhi kebutuhan cetak Anda dengan kualitas terbaik dan waktu pengerjaan yang cepat.</p>
                        <div class="row g-2 mb-4 pb-2">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Harga Terjangkau
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Kualitas Terbaik
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Pengiriman Cepat
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Layanan Profesional
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Map Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">Lokasi Kami</h6>
                        <h1 class="display-6 mb-4">Temukan Kami di Peta</h1>
                        <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.13442179207!2d117.4127767093651!3d-8.486308485824441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcbed9f7b3821c1%3A0x4aaeb6da842146e5!2sMS.Print!5e0!3m2!1sen!2sid!4v1719516452954!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map End -->
@endsection
