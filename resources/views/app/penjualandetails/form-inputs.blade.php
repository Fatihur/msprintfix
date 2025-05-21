@php $editing = isset($penjualandetail) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="penjualan_id" label="Penjualan" required>
            @php $selected = old('penjualan_id', ($editing ? $penjualandetail->penjualan_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Penjualan</option>
            @foreach($penjualans as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="produk_id" label="Produk" required>
            @php $selected = old('produk_id', ($editing ? $penjualandetail->produk_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Produk</option>
            @foreach($produks as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jumlah"
            label="Jumlah"
            :value="old('jumlah', ($editing ? $penjualandetail->jumlah : ''))"
            max="255"
            step="0.01"
            placeholder="Jumlah"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="total"
            label="Total"
            :value="old('total', ($editing ? $penjualandetail->total : ''))"
            max="255"
            step="0.01"
            placeholder="Total"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
