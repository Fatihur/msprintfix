@php $editing = isset($supplier) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama"
            label="Nama"
            :value="old('nama', ($editing ? $supplier->nama : ''))"
            maxlength="255"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_hp"
            label="No Hp"
            :value="old('no_hp', ($editing ? $supplier->no_hp : ''))"
            placeholder="No Hp"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="alamat"
            label="Alamat"
            :value="old('alamat', ($editing ? $supplier->alamat : ''))"
            placeholder="Alamat"
        ></x-inputs.text>
    </x-inputs.group>
</div>
