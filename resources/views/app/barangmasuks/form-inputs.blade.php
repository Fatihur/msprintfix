@php $editing = isset($barangmasuk) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="produk_id" label="Produk" required>
            @php $selected = old('produk_id', ($editing ? $barangmasuk->produk_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Produk</option>
            @foreach($produks as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="supplier_id" label="Supplier" required>
            @php $selected = old('supplier_id', ($editing ? $barangmasuk->supplier_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Supplier</option>
            @foreach($suppliers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="jumlah"
            label="Jumlah"
            :value="old('jumlah', ($editing ? $barangmasuk->jumlah : ''))"
            max="255"
            placeholder="Jumlah"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="harga_beli"
            label="Harga Beli"
            :value="old('harga_beli', ($editing ? $barangmasuk->harga_beli : ''))"
            max="255"
            placeholder="Harga Beli"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
