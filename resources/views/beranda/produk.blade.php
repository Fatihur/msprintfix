@extends('beranda.app')

@section('content')
<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Produk</h1>
                    <p>Jelajahi produk yang anda inginkan dari berbagai kategori</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 {{ $selectedCategory == 'all' ? 'active' : '' }}" href="{{ url('produk?category=all') }}">Semua Kategori</a>
                    </li>
                    @foreach ($kategoris as $item)
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 {{ $selectedCategory == $item->id ? 'active' : '' }}" href="{{ url('produk?category=' . $item->id) }}">{{ $item->kategori }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($produks as $item)

                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card shadow-sm">
                                <div class="product-item">

                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $item->judul }}</a>
                                        <span class="text-primary me-1">Rp {{ number_format($item->harga, 3, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="{{route('beranda.show',$item->id)}}">
                                                <i class="fa fa-eye text-primary me-2"></i>Detail
                                            </a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" target="_blank" href="https://wa.me/{{ $wa->wa }}?text=Halo, saya tertarik dengan produk *{{ $item->nama_produk }}*. Bagaimana cara saya memesan?">
                                                <i class="fab fa-whatsapp text-primary me-2"></i>Hubungi
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                </div>
                            </div>

                        @endforeach
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->
@endsection
