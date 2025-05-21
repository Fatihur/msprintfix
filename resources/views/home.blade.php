@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Selamat datang, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">Semoga harimu menyenangkan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Produk</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahProduk }}</h5>
                    <p class="card-text">Total jumlah produk yang tersedia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pendapatan Hari Ini</div>
                <div class="card-body">
                    <h5 class="card-title">Rp{{ number_format($pendapatanHariIni, 3, ',', '.') }}</h5>
                    <p class="card-text">Total pendapatan dari penjualan hari ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
