@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('suppliers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.supplier.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.supplier.inputs.nama')</h5>
                    <span>{{ $supplier->nama ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.supplier.inputs.no_hp')</h5>
                    <span>{{ $supplier->no_hp ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.supplier.inputs.alamat')</h5>
                    <span>{{ $supplier->alamat ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('suppliers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Supplier::class)
                <a href="{{ route('suppliers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
