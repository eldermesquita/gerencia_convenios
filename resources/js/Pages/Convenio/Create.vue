<template>
    <div class="p-0 container-fluid">
        <div>
            <FlashMessage :flash="flash" />
        </div>

        <h1 class="mb-1 h3"> {{ $props.errors?.processo?.ano }}</h1>
        <h1 class="mb-1 h3">Novo convênios </h1>

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <div class="mb-1 form-floating">
                                <select class="form-select" ref="refOIrgaoId" v-model="form.orgao_id"
                                    aria-label="Selecione o orgão" :class="{ 'is-invalid': errors.processo?.orgao_id }">
                                    <option selected> -- Selecione -- </option>
                                    <option v-for="(item, index) in  listaOrgoes" :key="index" :value="item.id"
                                        :selected="form.orgao_id === item.id">
                                        {{ item.nome }}
                                    </option>
                                </select>
                                <label for="acao_id"> Órgão Proponente <span class="text-danger">*</span></label>
                                <div v-if="errors.processo?.orgao_id" class="invalid-feedback">
                                    {{ errors.processo?.orgao_id }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 col-md-6">
                            <div class="mb-1 form-floating">
                                <select class="form-select" ref="refParlamentarId" v-model="form.parlamentar_id"
                                    aria-label="Selecione o parlamentar" :class="{ 'is-invalid': errors.parlamentar_id }">
                                    <option selected> -- Selecione -- </option>
                                    <option v-for="(item, index) in  listaParlamentares" :key="index" :value="item.id"
                                        :selected="form.parlamentar_id === item.id">
                                        {{ item.nome }}
                                    </option>
                                </select>
                                <label for="acao_id"> Parlamentar </label>
                                <div v-if="errors.parlamentar_id" class="invalid-feedback">
                                    {{ errors.parlamentar_id }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 col-md-6">
                            <div class="mb-1 form-floating">
                                <input type="text" class="mb-1 form-control" :class="{ 'is-invalid': errors.numero }"
                                    v-model="form.numero" ref="refNumero" placeholder="Nº convênios">
                                <label for="numero">Número do convênios <span class="text-danger">*</span></label>
                                <div v-if="errors.numero" class="invalid-feedback">
                                    {{ errors.numero }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 col-md-6">
                            <div class="mb-1 form-floating">
                                <input type="text" class="mb-1 form-control" :class="{ 'is-invalid': errors.ano }"
                                    v-model="form.ano" ref="refAno" placeholder="Ano do convênios">
                                <label for="ano">Ano do convênios <span class="text-danger">*</span></label>
                                <div v-if="errors.ano" class="invalid-feedback">
                                    {{ errors.ano }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-4">
                        <fieldset class="border p-2">
                            <legend class="float-none w-auto p-2 text-small">Processo</legend>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <div class="mb-1 form-floating">
                                        <select class="form-select" ref="refModalidade" v-model="form.processo.modalidade"
                                            aria-label="Selecione o orgão"
                                            :class="{ 'is-invalid': errors.processo?.modalidade }">
                                            <option :selected="form.processo.modalidade === 0" value="0"> -- Selecione --
                                            </option>
                                            <option v-for="(item, index) in  modalidadeLista" :key="index" :value="item"
                                                :selected="form.processo.modalidade === item">
                                                {{ item }}
                                            </option>
                                        </select>
                                        <label for="modalidade"> Modalidade <span class="text-danger">*</span></label>
                                        <div v-if="errors.processo?.modalidade" class="invalid-feedback">
                                            {{ errors.processo?.modalidade }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <div class="mb-1 form-floating">
                                        <input type="text" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.processo?.numero }"
                                            v-model="form.processo.numero" ref="refProcessoNumero" placeholder="Nº ">
                                        <label class="form-label" for="processo.numero">Número:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.processo?.numero" class="invalid-feedback">
                                            {{ errors.processo?.numero }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <div class="mb-1 form-floating">
                                        <input type="text" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.processo?.ano }" v-model="form.processo.ano"
                                            ref="refProcessoAno" placeholder="Ano processo">
                                        <label for="processo.ano">Ano <span class="text-danger">*</span></label>
                                        <div v-if="errors.processo?.ano" class="invalid-feedback">
                                            {{ errors.processo?.ano }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="row mb-4">
                        <fieldset class="border p-2">
                            <legend class="float-none w-auto p-2 text-small">Datas</legend>
                            <div class="row">
                                <div class="mb-1 col-lg-4">
                                    <div class="mb-1 form-floating">
                                        <input type="date" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.inicio_vigencia }" v-model="form.inicio_vigencia"
                                            ref="refInicioVirgencia" placeholder="Data início da virgência">
                                        <label class="form-label" for="inicio_vigencia">Início virgência: <span
                                                class="text-danger">*</span></label>
                                        <div v-if="errors.inicio_vigencia" class="invalid-feedback">
                                            {{ errors.inicio_vigencia }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-lg-4">
                                    <div class="mb-1 form-floating">
                                        <input type="date" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.fim_vigencia }" v-model="form.fim_vigencia"
                                            ref="refFimVirgencia" placeholder="Data Fim da virgência">
                                        <label class="form-label" for="fim_vigencia">Início virgência: <span
                                                class="text-danger">*</span></label>
                                        <div v-if="errors.fim_vigencia" class="invalid-feedback">
                                            {{ errors.fim_vigencia }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-lg-4">
                                    <div class="mb-1 form-floating">
                                        <input type="date" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.vigencia_prestacao_contas }"
                                            v-model="form.vigencia_prestacao_contas" ref="refVirgenciaPrestacaoContas"
                                            placeholder="Data prestação de contas">
                                        <label class="form-label" for="vigencia_prestacao_contas">Virgência prestação
                                            contas: <span class="text-danger">*</span></label>
                                        <div v-if="errors.vigencia_prestacao_contas" class="invalid-feedback">
                                            {{ errors.vigencia_prestacao_contas }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="row mb-4">
                        <fieldset class="border p-2">
                            <legend class="float-none w-auto p-2 text-small">Valores</legend>
                            <div class="row">
                                <div class="mb-1 col-lg-6">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_repasse"
                                            ref="refValorRepasse" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.valor_repasse }" />
                                        <label class="form-label" for="valor_repasse">Valor de repasse:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_repasse" class="invalid-feedback">
                                            {{ errors.valor_repasse }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-lg-6">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_contrapartida"
                                            ref="refValorContraPartida" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.valor_contrapartida }" />
                                        <label class="form-label" for="valor_contrapartida">Valor Contrapartida:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_contrapartida" class="invalid-feedback">
                                            {{ errors.valor_contrapartida }}
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mb-1 col-md-2">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_total" ref="refValorTotal"
                                            class="mb-1 form-control" :class="{ 'is-invalid': errors.valor_total }" />
                                        <label class="form-label" for="valor_total">Valor total:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_total" class="invalid-feedback">
                                            {{ errors.valor_total }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_liberado_concedente"
                                            ref="refValorLiberadoConcedente" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.valor_liberado_concedente }" />
                                        <label class="form-label" for="valor_liberado_concedente">Valor liberado concedente:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_liberado_concedente" class="invalid-feedback">
                                            {{ errors.valor_liberado_concedente }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_liberado"
                                            ref="refValorLiberado" class="mb-1 form-control"
                                            :class="{ 'is-invalid': errors.valor_liberado }" />
                                        <label class="form-label" for="valor_liberado">Valor liberado:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_liberado" class="invalid-feedback">
                                            {{ errors.valor_liberado }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <div class="mb-1 form-floating">
                                        <Money3 v-bind="configVMoney" v-model.number="form.valor_pago" ref="refValorPago"
                                            class="mb-1 form-control" :class="{ 'is-invalid': errors.valor_pago }" />
                                        <label class="form-label" for="valor_pago">Valor pago:
                                            <span class="text-danger">*</span></label>
                                        <div v-if="errors.valor_pago" class="invalid-feedback">
                                            {{ errors.valor_pago }}
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                        </fieldset>
                    </div>


                    <div class="mb-1 col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
                        <a :href="route('convenios.index')" class="btn btn-secondary ">
                        <i class="fas fa-sign-in-alt"></i> Sair </a>

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
import { ref, defineProps, computed, onMounted, getCurrentInstance } from 'vue';
import { Inertia } from '@inertiajs/inertia';
/* import { Link } from '@inertiajs/vue3' */
/* import { router } from '@inertiajs/vue3' */

import FlashMessage from "@/Components/FlashMessage.vue";
import { exibirAlerta, exibirAlerta2, exibirLoading, fecharLoading } from '@/Uteis/dialogo';
import axios from '@/Uteis/axiosInterceptor';
import { Money3 } from 'v-money3'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { formatarDataDB } from '@/Uteis/funcoes';

/* const props = defineProps(['convenios', 'errors', 'flash', 'auth']); */
const { convenios, errors, flash, auth } = defineProps(['convenios', 'errors', 'flash', 'auth']);
const botaoDesabilitado = ref(false);
const modalidadeLista = ref(['Concorrência', 'Convite', 'Tomada de preço', 'Concurso', 'Pregão', 'Leilão']);

const form = ref({
    id: null,
    numero: null,
    ano: null,
    objeto: null,
    valor_repasse: 0,
    valor_contrapartida: 0,
    inicio_vigencia: null,
    fim_vigencia: null,
    vigencia_prestacao_contas: null,
    parlamentar_id: 0,
    processo: [{
        id: null,
        numero: null,
        ano: null,
        licitado: null,
        modalidade: 0,
        orgao_id: 0,
        convenio_id: null,
    }],
});


/*****************************************************************
 * Configuração do v-money3
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
const listaParlamentares = ref([]);

onMounted(async () => {

console.log('tag', convenios)
    // Checar se tem objeto e sincroniza com o form (usado para EDITAR)
    if (typeof convenios !== 'undefined') {

        form.value = { ...convenios }
        form.value.inicio_vigencia = formatarDataDB(convenios.inicio_vigencia)
        form.value.fim_vigencia = formatarDataDB(convenios.fim_vigencia)
        form.value.vigencia_prestacao_contas = formatarDataDB(convenios.vigencia_prestacao_contas)

        if (!convenios.processo || convenios.processo === null) {
            form.value.processo = {
                id: null,
                numero: null,
                ano: null,
                licitado: null,
                modalidade: 0,
                orgao_id: 0,
                convenio_id: null,
            }
        }
    }

    try {
        exibirLoading("Aguarde...");

        const response = await axios.get(route('orgaos.lista'));
        const response1 = await axios.get(route('parlamentares.lista'));
        listaOrgoes.value = response.data;
        listaParlamentares.value = response1.data;

    } catch (error) {
        console.log('Erro ao processar as requisições:', error.message);
    }

});




/*****************************************************************
 *  Salvar e Editar
 *****************************************************************/
const salvar = async () => {

    // Simulando um processo assíncrono
    /*
        await new Promise(resolve => setTimeout(resolve, 3000));
        botaoDesabilitado.value = false;
        exibirAlerta("Salvo com sucesso!", 'teste teste', "success");
        fecharLoading();
    */

    // Alterar o estado do botão ao iniciar a requisição
    botaoDesabilitado.value = true;
    exibirLoading('Aguarde...');


    let method = "post";
    let url = route("convenios.store");
    if (form.value.id) {
        method = "put";
        url = route("convenios.update", form.value.id);
    }

    Inertia.visit(url, {
        method: method,
        data: form.value,
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            exibirAlerta("Salvo com sucesso!", form.value.numero, "success");
        },
        onError: (errors1) => {
            console.log('----key---', errors1)
            for (let [key, value] of Object.entries(errors1)) {



                exibirAlerta2('', value, "error");
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
    font-size: 0.8rem;
    font-weight: bold;
    line-height: inherit;
}
</style>
