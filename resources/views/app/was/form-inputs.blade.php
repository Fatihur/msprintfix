@php $editing = isset($wa) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wa"
            label="Wa"
            :value="old('wa', ($editing ? $wa->wa : ''))"
            placeholder="Wa"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
