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
                                <select class="form-select" ref="refOIrgaoId" v-model="form.orgao_id"
                                    aria-label="Selecione o orgão" :class="{ 'is-invalid': errors.orgao_id }">
                                    <option selected> -- Selecione -- </option>
                                    <option v-for="(item, index) in  listaOrgoes" :key="index" :value="item.id"
                                        :selected="form.orgao_id === item.id">
                                        {{ item.nome }}
                                    </option>
                                </select>
                                <label for="acao_id"> Orgão <span class="text-danger">*</span></label>
                                <div v-if="errors.orgao_id" class="invalid-feedback">
                                    {{ errors.orgao_id }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-2">
                            <div class="mb-3 form-floating">
                                <input type="text" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.numero }" v-model="form.numero" ref="refNumero"
                                    placeholder="Nº convênios">
                                <label for="numero">Número do convênios <span class="text-danger">*</span></label>
                                <div v-if="errors.numero" class="invalid-feedback">
                                    {{ errors.numero }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-1">
                            <div class="mb-3 form-floating">
                                <input type="text" class="mb-3 form-control" required :class="{ 'is-invalid': errors.ano }"
                                    v-model="form.ano" ref="refAno" placeholder="Nº convênios">
                                <label for="ano">Ano do convênios <span class="text-danger">*</span></label>
                                <div v-if="errors.ano" class="invalid-feedback">
                                    {{ errors.ano }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-2">
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
                        <div class="mb-3 col-md-2">

                            <div class="mb-3 form-floating">
                                <input type="date" class="mb-3 form-control" required
                                    :class="{ 'is-invalid': errors.virgencia }" v-model="form.virgencia" ref="refVirgencia"
                                    placeholder="Virgência">
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
                                    placeholder="Data prestação de contas">
                                <label class="form-label" for="virgencia_prestacao_contas">Virgência prestação contas: <span
                                        class="text-danger">*</span></label>
                                <div v-if="errors.virgencia_prestacao_contas" class="invalid-feedback">
                                    {{ errors.virgencia_prestacao_contas }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <fieldset class="border p-2">
                            <legend class="float-none w-auto p-2 text-small">Valores</legend>
                            <div class="row">
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_repasse"
                                            ref="refValorRepasse" class="mb-3 form-control"
                                            :class="{ 'is-invalid': errors.valor_repasse }" />
                                        <label class="form-label" for="valor_repasse">Valor do repasse:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_repasse" class="invalid-feedback">
                                            {{ errors.valor_repasse }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_contra_partida"
                                            ref="refValorContraPartida" class="mb-3 form-control"
                                            :class="{ 'is-invalid': errors.valor_contra_partida }" />
                                        <label class="form-label" for="valor_contra_partida">Valor contra partida:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_contra_partida" class="invalid-feedback">
                                            {{ errors.valor_contra_partida }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_total" ref="refValorTotal"
                                            class="mb-3 form-control" :class="{ 'is-invalid': errors.valor_total }" />
                                        <label class="form-label" for="valor_total">Valor total:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_total" class="invalid-feedback">
                                            {{ errors.valor_total }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_liberado_concedente"
                                            ref="refValorLiberadoConcedente" class="mb-3 form-control"
                                            :class="{ 'is-invalid': errors.valor_liberado_concedente }" />
                                        <label class="form-label" for="valor_liberado_concedente">Valor liberado concedente:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_liberado_concedente" class="invalid-feedback">
                                            {{ errors.valor_liberado_concedente }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_liberado"
                                            ref="refValorLiberado" class="mb-3 form-control"
                                            :class="{ 'is-invalid': errors.valor_liberado }" />
                                        <label class="form-label" for="valor_liberado">Valor liberado:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_liberado" class="invalid-feedback">
                                            {{ errors.valor_liberado }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <div class="mb-3 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_pago" ref="refValorPago"
                                            class="mb-3 form-control" :class="{ 'is-invalid': errors.valor_pago }" />
                                        <label class="form-label" for="valor_pago">Valor pago:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_pago" class="invalid-feedback">
                                            {{ errors.valor_pago }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="mb-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div id="scrolling-container">
                            <div id="quill-container">
                                <label class="form-label" for="resumo">Objeto <span class="text-danger">*</span></label>

                                <QuillEditor theme="snow" ref="refObjeto" toolbar="essential" v-model:content="form.objeto"
                                    :placeholder="`Descrição do objeto`" contentType="html" />
                            </div>


                        </div>
                        <div v-if="errors.objeto" class="invalid-feedback">
                            {{ errors.objeto }}
                        </div>
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
import { ref, defineProps, computed, onMounted  } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import FlashMessage from "@/Components/FlashMessage.vue";
import { exibirAlerta, exibirLoading, fecharLoading } from '@/Uteis/dialogo';
import axios from '@/Uteis/axiosInterceptor';
import { Money3 } from 'v-money3'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
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

const listaOrgoes = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(route('orgaos.lista'));
        ///console.log(' requisição:',  response);
        listaOrgoes.value = response.data;
    } catch (error) {
        console.log('Erro na requisição:',  error.message);
    }
});
/*****************************************************************
 *  Salvar
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
