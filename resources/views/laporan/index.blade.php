@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Pilih Tanggal Laporan Penjualan</h1>
        <form action="{{ route('laporan.generate') }}" method="GET">
            <div class="card d-flex">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="col-sm-2 col-form-label">Dari:</label>
                        <div class="col-sm-10">
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="col-sm-2 col-form-label">Sampai:</label>
                        <div class="col-sm-10">
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 ">
                        <button type="submit" class="btn btn-primary">Generate Laporan</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
