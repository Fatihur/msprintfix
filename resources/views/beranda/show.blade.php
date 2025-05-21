@extends('beranda.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ $produk->gambar ? \Storage::url($produk->gambar) : '' }}" class="img-fluid" alt="{{ $produk->nama_produk }}">
            </div>
            <div class="col-lg-6">
                <h1>{{ $produk->judul }}</h1>
                <h2 class="text-primary">Rp {{ number_format($produk->harga, 3, ',', '.') }}</h2>
                <p>{!! $produk->deskripsi !!}</p>
                <a href="https://wa.me/{{ $wa->wa }}?text=Halo, saya tertarik dengan produk *{{ $produk->nama_produk }}*. Bagaimana cara saya memesan?" target="_blank" class="btn btn-primary">
                    <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
