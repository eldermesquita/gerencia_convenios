@php $editing = isset($convenio) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="numero"
            label="Numero"
            :value="old('numero', ($editing ? $convenio->numero : ''))"
            maxlength="50"
            placeholder="Numero"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="numero_processo_sei"
            label="Numero Processo Sei"
            :value="old('numero_processo_sei', ($editing ? $convenio->numero_processo_sei : ''))"
            maxlength="30"
            placeholder="Numero Processo Sei"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.date
            name="virgencia"
            label="Virgência"
            value="{{ old('virgencia', ($editing ? optional($convenio->virgencia)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="contrato_id" label="Contrato" required>
            @php $selected = old('contrato_id', ($editing ? $convenio->contrato_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Contrato</option>
            @foreach($contratos as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_repasse"
            label="Valor Repasse"
            :value="old('valor_repasse', ($editing ? $convenio->valor_repasse : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Repasse"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_contra_partida"
            label="Valor Contra Partida"
            :value="old('valor_contra_partida', ($editing ? $convenio->valor_contra_partida : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Contra Partida"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_total"
            label="Valor Total"
            :value="old('valor_total', ($editing ? $convenio->valor_total : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Total"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_liberado_concedente"
            label="Valor Liberado Concedente"
            :value="old('valor_liberado_concedente', ($editing ? $convenio->valor_liberado_concedente : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Liberado Concedente"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_pago"
            label="Valor Pago"
            :value="old('valor_pago', ($editing ? $convenio->valor_pago : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Pago"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.number
            name="valor_liberado"
            label="Valor Liberado"
            :value="old('valor_liberado', ($editing ? $convenio->valor_liberado : ''))"
            max="255"
            step="0.01"
            placeholder="Valor Liberado"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="objeto" label="Objeto" maxlength="255" required
            >{{ old('objeto', ($editing ? $convenio->objeto : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
