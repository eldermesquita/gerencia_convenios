@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('convenios.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.convenios.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.numero')</h5>
                    <span>{{ $convenio->numero ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.numero_processo_sei')</h5>
                    <span>{{ $convenio->numero_processo_sei ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.virgencia')</h5>
                    <span>{{ $convenio->virgencia ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.contrato_id')</h5>
                    <span
                        >{{ optional($convenio->contrato)->identificacao ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.valor_repasse')</h5>
                    <span>{{ $convenio->valor_repasse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.valor_contra_partida')</h5>
                    <span>{{ $convenio->valor_contra_partida ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.valor_total')</h5>
                    <span>{{ $convenio->valor_total ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.convenios.inputs.valor_liberado_concedente')
                    </h5>
                    <span
                        >{{ $convenio->valor_liberado_concedente ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.valor_pago')</h5>
                    <span>{{ $convenio->valor_pago ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.valor_liberado')</h5>
                    <span>{{ $convenio->valor_liberado ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.convenios.inputs.objeto')</h5>
                    <span>{{ $convenio->objeto ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('convenios.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Convenio::class)
                <a href="{{ route('convenios.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
