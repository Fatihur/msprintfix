@php $editing = isset($penjualan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="tanggal"
            label="Tanggal"
            value="{{ old('tanggal', ($editing ? optional($penjualan->tanggal)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="konsumen"
            label="Konsumen"
            :value="old('konsumen', ($editing ? $penjualan->konsumen : ''))"
            maxlength="255"
            placeholder="Konsumen"
        ></x-inputs.text>
    </x-inputs.group>
</div>
