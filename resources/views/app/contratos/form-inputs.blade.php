@php $editing = isset($contrato) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="identificacao"
            label="Identificacao"
            :value="old('identificacao', ($editing ? $contrato->identificacao : ''))"
            maxlength="255"
            placeholder="Identificacao"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
