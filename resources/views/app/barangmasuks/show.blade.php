@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('barangmasuks.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.barang_masuk.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.barang_masuk.inputs.produk_id')</h5>
                    <span
                        >{{ optional($barangmasuk->produk)->judul ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.barang_masuk.inputs.supplier_id')</h5>
                    <span
                        >{{ optional($barangmasuk->supplier)->nama ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.barang_masuk.inputs.jumlah')</h5>
                    <span>{{ $barangmasuk->jumlah ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.barang_masuk.inputs.harga_beli')</h5>
                    <span>{{ $barangmasuk->harga_beli ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('barangmasuks.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Barangmasuk::class)
                <a
                    href="{{ route('barangmasuks.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
