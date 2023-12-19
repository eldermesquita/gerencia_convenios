<template>
    <div class="p-0 container-fluid">
        <div>
            <FlashMessage :flash="flash" />
        </div>
        <h1 class="mb-3 h3">Novo convênios</h1>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <div class="mb-3 form-floating">
                                <input type="text" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.numero }" v-model="form.numero" ref="refNumero"
                                    placeholder="Nº ">
                                <label for="numero">Número <span class="text-danger">*</span></label>
                                <div v-if="errors.numero" class="invalid-feedback">
                                    {{ errors.numero }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="mb-3 form-floating">
                                <input type="text" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.numero_processo }" v-model="form.numero_processo"
                                    ref="refNumeroProcesso" placeholder="Nº ">
                                <label class="form-label" for="numero_processo">Número do processo: <span
                                        class="text-danger">*</span></label>
                                <div v-if="errors.numero_processo" class="invalid-feedback">
                                    {{ errors.numero_processo }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">

                            <div class="mb-3 form-floating">
                                <input type="date" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.virgencia }" v-model="form.virgencia" ref="refVirgencia"
                                    placeholder="Nº ">
                                <label class="form-label" for="virgencia">Virgência: <span
                                        class="text-danger">*</span></label>
                                <div v-if="errors.virgencia" class="invalid-feedback">
                                    {{ errors.virgencia }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-2">
                            <div class="mb-3 form-floating">
                                <input type="date" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.virgencia_prestacao_contas }"
                                    v-model="form.virgencia_prestacao_contas" ref="refVirgenciaPrestacaoContas"
                                    placeholder="Data ">
                                <label class="form-label" for="virgencia_prestacao_contas">Virgência prestação contas: <span
                                        class="text-danger">*</span></label>
                                <div v-if="errors.virgencia_prestacao_contas" class="invalid-feedback">
                                    {{ errors.virgencia_prestacao_contas }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                 <fieldset class="border p-2">
                              <legend  class="float-none w-auto p-2 text-small">Valores</legend>
                            <div class="mb-3 col-md-3">
                                <div class="mb-3 form-floating">
                                     <Money3  v-bind="configVMoney"  v-model.number="form.valor_repasse" ref="refValorRepasse"
                                            class="mb-3 form-control" :class="{ 'is-invalid': errors.valor_repasse }"/>
                                    <label class="form-label" for="valor_repasse">Valor do repasse:
                                        <span class="text-danger">*</span></label>
                                    <div v-if="errors.valor_repasse" class="invalid-feedback">
                                        {{ errors.valor_repasse }}
                                    </div>
                                </div>
                            </div>

                    </fieldset>

                    </div>

                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="inputAddress2">Address 2</label>
                        <input type="text" class="mb-3 form-control form-control-lg" id="inputAddress2"
                            placeholder="Apartment, studio, or floor">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputCity">City</label>
                            <input type="text" class="mb-3 form-control form-control-lg" id="inputCity">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">State</label>
                            <select id="inputState" class="mb-3 form-control form-control-lg">
                                <option selected="">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="inputZip">Zip</label>
                            <input type="text" class="mb-3 form-control form-control-lg" id="inputZip">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <input type="checkbox" class="form-check-input">
                            <span class="form-check-label">Check me out</span>
                        </label>
                    </div>


                    <div class="modal-footer">
                        <Link :href="route('convenios.index')" class="btn btn-secondary ">
                        <i class="fas fa-sign-in-alt"></i> Sair </Link>

                        <button @click.prevent="salvar()" class="m-1 btn btn-primary" :disabled="botaoDesabilitado">
                            <i v-show="!botaoDesabilitado" class="far fa-save"></i>
                            <span v-if="botaoDesabilitado" class="spinner-border spinner-border-sm text-info me-2"
                                role="status" aria-hidden="true"> </span>
                            <span v-if="!botaoDesabilitado"> Salvar </span>
                            <span v-else> Enviando... </span>

                        </button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, defineProps, computed  } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import FlashMessage from "@/Components/FlashMessage.vue";
import { exibirAlerta, exibirLoading, fecharLoading } from '@/Uteis/dialogo';
import { Money3 } from 'v-money3'
const props = defineProps(['convenios', 'errors', 'flash', 'auth']);
const botaoDesabilitado = ref(false);


const form = ref({
    id: null,
    numero: null,
    objeto: null,
    numero_processo: null,
    valor_repasse: 0,
    valor_contra_partida: 0,
    valor_total: 0,
    valor_liberado_concedente: 0,
    valor_pago: 0,
    valor_liberado: 0,
    virgencia: null,
    virgencia_prestacao_contas: null,
    contrato_id: null,
    orgao_id: null,
});

/*
const formatarMoedaInput = (_campo) => {
    const valorString = form.value[_campo].toString();
    console.log('tag', valorString)
    form.value[_campo] = formatarMoedaPtBr(valorString);
} */

/*****************************************************************
 *
 * Configuração do v-money3
 *
 *****************************************************************/
const configVMoney = computed(() => {
    return {
        decimal: ',', // Separador decimal
        thousands: '.', // Separador de milhares
        prefix: 'R$ ', // Prefixo
        suffix: '', // Sufixo
        precision: 2, // Número de casas decimais
        masked: false // Deixa o campo sem a máscara inicialmente

    };
});


/*****************************************************************
 *  Salvar
 *
 *****************************************************************/
const salvar = async () => {
    // Alterar o estado do botão ao iniciar a requisição
    botaoDesabilitado.value = true;

    /*  const { isConfirmed } = await confirmarAcao("Deseja confirmar a exclusão?");
     if (!isConfirmed) return; */

    exibirLoading('Aguarde...');


    let method = "post";
    let url = route("convenios.store");
    if (form.value.id) {
        method = "put";
        url = route("convenios.update", form.value.id);
    }
        // Simulando um processo assíncrono
        /*
            await new Promise(resolve => setTimeout(resolve, 3000));
            botaoDesabilitado.value = false;
            exibirAlerta("Salvo com sucesso!", 'teste teste', "success");
            fecharLoading();
        */

    Inertia.visit(url, {
        method: method,
        data: form,
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            exibirAlerta("Salvo com sucesso!", form.value.numero, "success");
        },
        onError: (errors) => {
            for (let [key, value] of Object.entries(errors)) {
                exibirAlerta('', value, "error");
            }
        },
        onFinish: () => {
            botaoDesabilitado.value = false;
            fecharLoading();
        },
    });


}
</script>
<style>
legend {
    float: left;
    width: 100%;
    padding: 0;
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
    font: bold;
    line-height: inherit;
}
</style>
