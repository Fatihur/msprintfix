@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('penjualandetails.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.detail_penjualan.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.detail_penjualan.inputs.penjualan_id')</h5>
                    <span
                        >{{ optional($penjualandetail->penjualan)->tanggal ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.detail_penjualan.inputs.produk_id')</h5>
                    <span
                        >{{ optional($penjualandetail->produk)->judul ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.detail_penjualan.inputs.jumlah')</h5>
                    <span>{{ $penjualandetail->jumlah ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.detail_penjualan.inputs.total')</h5>
                    <span>{{ $penjualandetail->total ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('penjualandetails.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Penjualandetail::class)
                <a
                    href="{{ route('penjualandetails.create') }}"
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
