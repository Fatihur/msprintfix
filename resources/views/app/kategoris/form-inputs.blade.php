@php $editing = isset($kategori) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="kategori"
            label="Kategori"
            :value="old('kategori', ($editing ? $kategori->kategori : ''))"
            maxlength="255"
            placeholder="Kategori"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
