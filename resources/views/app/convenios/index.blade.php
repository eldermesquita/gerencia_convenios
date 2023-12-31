@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.convenios.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Convenio::class)
                        <a
                            href="{{ route('convenios.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.convenios.inputs.numero')
                            </th>
                            <th class="text-left">
                                @lang('crud.convenios.inputs.numero_processo_sei')
                            </th>
                            <th class="text-left">
                                @lang('crud.convenios.inputs.virgencia')
                            </th>
                            <th class="text-left">
                                @lang('crud.convenios.inputs.contrato_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_repasse')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_contra_partida')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_total')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_liberado_concedente')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_pago')
                            </th>
                            <th class="text-right">
                                @lang('crud.convenios.inputs.valor_liberado')
                            </th>
                            <th class="text-left">
                                @lang('crud.convenios.inputs.objeto')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($convenios as $convenio)
                        <tr>
                            <td>{{ $convenio->numero ?? '-' }}</td>
                            <td>{{ $convenio->numero_processo_sei ?? '-' }}</td>
                            <td>{{ $convenio->virgencia ?? '-' }}</td>
                            <td>
                                {{ optional($convenio->contrato)->identificacao
                                ?? '-' }}
                            </td>
                            <td>{{ $convenio->valor_repasse ?? '-' }}</td>
                            <td>
                                {{ $convenio->valor_contra_partida ?? '-' }}
                            </td>
                            <td>{{ $convenio->valor_total ?? '-' }}</td>
                            <td>
                                {{ $convenio->valor_liberado_concedente ?? '-'
                                }}
                            </td>
                            <td>{{ $convenio->valor_pago ?? '-' }}</td>
                            <td>{{ $convenio->valor_liberado ?? '-' }}</td>
                            <td>{{ $convenio->objeto ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $convenio)
                                    <a
                                        href="{{ route('convenios.edit', $convenio) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $convenio)
                                    <a
                                        href="{{ route('convenios.show', $convenio) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $convenio)
                                    <form
                                        action="{{ route('convenios.destroy', $convenio) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">{!! $convenios->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
