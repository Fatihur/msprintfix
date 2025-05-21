@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('produks.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.produk.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.judul')</h5>
                    <span>{{ $produk->judul ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.kategori_id')</h5>
                    <span
                        >{{ optional($produk->kategori)->kategori ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.gambar')</h5>
                    <x-partials.thumbnail
                        src="{{ $produk->gambar ? \Storage::url($produk->gambar) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.deskripsi')</h5>
                    <span>{{ $produk->deskripsi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.harga')</h5>
                    <span>{{ $produk->harga ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.produk.inputs.stok')</h5>
                    <span>{{ $produk->stok ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('produks.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Produk::class)
                <a href="{{ route('produks.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
