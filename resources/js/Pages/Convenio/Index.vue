use GuzzleHttp\Promise\Promise;
<template>
    <div class="p-0 container-fluid">
        <div>
            <FlashMessage :flash="props.flash" />
        </div>
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Lista</strong> convênios</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <Link :href="route('convenios.create')" preserve-state preserve-scroll
                    class="btn btn-success btn-lg me-1 px-3" style="margin-left: 5px"><i class="fa-solid fa-add"></i>
                Novo cadastro
                </Link>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header  border-bottom ">
                        <div class="card-actions float-end ">
                            <div class="dropdown position-relative">
                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"
                                    class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Filtro avançado</a>
                                </div>
                            </div>
                        </div>
                        <h6 class="card-title mb-0 text-sm">Filtros de busca</h6>
                        <form autocomplete="on" novalidate class="mb-3 mt-3" @submit.prevent="filtrar()">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3 form-floating">
                                        <select class="form-select" ref="refOrgaoId" v-model="filtro.orgaoId"
                                            aria-label="Selecione o órgão">
                                            <option :selected="props.filtro.orgaoId === 0" value="0"> -- Selecione --
                                            </option>
                                            <option v-for="(item, index) in  listaOrgoes" :key="index" :value="item.id"
                                                :selected="props.filtro.orgaoId === item.id">
                                                {{ item.nome }}
                                            </option>
                                        </select>
                                        <label for="orgaoId"> Órgão</label>

                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="mb-3 form-floating">
                                        <input type="date" class="form-control" v-model="filtro.inicioVigencia" />
                                        <label for="inicioVigencia">Início da vigência</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="mb-3 form-floating">
                                        <input type="date" class="form-control" v-model="filtro.fimVigencia" />
                                        <label for="fimVigencia">Fim da vigência</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="mb-3 form-floating">
                                        <input type="number" class="form-control" v-model.number="filtro.numero" />
                                        <label for="numero">Nº convênio</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="mb-3 form-floating">
                                        <input type="number" class="form-control" v-model.number="filtro.numeroProcesso" />
                                        <label for="numeroProcesso">Nº processo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto text-end mt-n1">
                                <div class="row no-print">

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg me-1 px-3 m-1"
                                            :disabled="botaoDesabilitado">
                                            <span v-if="botaoDesabilitado" class="spinner-border spinner-border-sm"
                                                role="status" aria-hidden="true">
                                            </span>
                                            <i v-else class="fa-solid fa-magnifying-glass"></i>
                                            <span v-if="!botaoDesabilitado"> Pesquisar </span>
                                            <span v-else> Pesquisando... </span>
                                        </button>

                                        <Link as="button" v-if="route().params.search ||
                                            props.filtro.numero ||
                                            props.filtro.numeroProcesso ||
                                            props.filtro.inicioVigencia ||
                                            props.filtro.fimVigencia ||
                                            (props.filtro.orgaoId && $props.filtro.orgaoId !== 0)" preserve-state
                                            preserve-scroll class="btn btn-secondary btn-lg me-1 px-3"
                                            :href="route('convenios.index')">
                                        <i class="fa-solid fa-eraser"></i>
                                        Limpar
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                         <div v-if="convenios.data.length > 0" class="table-responsive">
                            <table class="table table-striped table-hover" aria-describedby="listaConvenio">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th class="text-center">Ano </th>
                                        <th class="text-center">Início vigência</th>
                                        <th class="text-center">Fim vigência</th>
                                        <th class="text-center">Prestação de contas</th>
                                        <th class="d-none d-md-table-cell text-center">Valor repasse</th>
                                        <th class="d-none d-md-table-cell text-center">Valor contrapartida</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in  convenios.data" :key="index">
                                        <td class="text-center">{{ item.numero }}</td>
                                        <td class="text-center">{{ item.ano }}</td>
                                        <td class="text-center">{{ item.inicio_vigencia }} </td>
                                        <td class="text-center">{{ item.fim_vigencia }} </td>
                                        <td class="text-center">{{ item.vigencia_prestacao_contas }}
                                            <span
                                                :class="(calcularDiferencaEmDias(item.vigencia_prestacao_contas) <= 0) ? 'badge bg-danger' : 'badge bg-primary'">
                                                {{ `${calcularDiferencaEmDias(item.vigencia_prestacao_contas)} dias` }}
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell text-center">{{ item.valor_repasse }}</td>
                                        <td class="d-none d-md-table-cell text-center">{{ item.valor_contrapartida }}</td>
                                        <td class="text-nowrap text-center">
                                            <a href="javascript:void(0);" :ref="`refDetalhe${item.id}`"
                                                @click.prevent="abrirModal(item, 'Detalhes do convênio')"
                                                class="btn btn-sm btn-info  me-1 px-3 mr-2 " data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Detalhes">
                                                <i class="fas fa-book-open-reader fa-1x "></i>
                                            </a>
                                            <Link :href="route('convenios.edit', item)"
                                                class="btn btn-sm btn-primary  me-1 px-3 mr-2 " :ref="`refEditar${item.id}`"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <i class="fas fa-edit fa-1x "></i>
                                            </Link>
                                            <a href="javascript:void(0);" :ref="`refExcluir${item.id}`"
                                                @click="deletar(item)" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Excluir" class="btn btn-sm btn-danger me-1 px-3 mr-2">
                                                <i class="fas fa-trash fa-1x "></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot v-if="!ocultarPaginacao">
                                    <tr>
                                        <td colspan="8">
                                            <div>
                                                <Paginacao :data="convenios" />
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                         <div v-else class="row align-content-center text-center">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">
                                        <strong> Nenhum registro foi encontrado!</strong>
                                    </div>
    							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Modal v-if="modalId" :modalId="modalId.toString()" :title="modalTitulo">
            <Show :itens="form" />
        </Modal>

    </div>
</template>
<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3'
import { ref, defineProps, computed, onMounted } from 'vue';
import FlashMessage from "@/Components/FlashMessage.vue";
import Paginacao from "@/Components/Pagination.vue";
import Modal from "@/Components/Modal.vue";
import Show from "@/Pages/Convenio/Show.vue";
import { exibirAlerta2, exibirLoading, fecharLoading, exibirConfirmacao } from '@/Uteis/dialogo';
import { calcularDiferencaEmDias } from '@/Uteis/funcoes';
import axios from '@/Uteis/axiosInterceptor';


const props = defineProps(['convenios', 'errors', 'flash', 'auth', 'filtro']);

const form = ref({
    id: null,
    numero: null,
    ano: null,
    objeto: null,
    numero_processo: null,
    ano_processo: null,
    valor_repasse: 0,
    valor_contrapartida: 0,
    inicio_vigencia: null,
    fim_vigencia: null,
    vigencia_prestacao_contas: null,
    parlamentar_id: 0,
    orgao_id: 0,
    processo: [],
});

const alertaAtraso = ref(false);
const botaoDesabilitado = ref(false);
/*****************************************************************
 * Paginação
 *****************************************************************/
const ocultarPaginacao = computed(() => {
    return !props.convenios.prev_page_url && !props.convenios.next_page_url;
});

/*****************************************************************
   * Tooltips
*****************************************************************/
const habilitarToolTips = (() => {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((tooltipTriggerEl) => {
        try {
            new bootstrap.Tooltip(tooltipTriggerEl);
        } catch (e) {
            console.log("tooltip", e);
        }
    });

    /*     const tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );

        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {

            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    */
});


/*****************************************************************
 * Modal
 *****************************************************************/
const modalId = ref('id');
const modalTitulo = ref('Título do Modal');

const abrirModal = (async (_item, _titulo = 'Título do Modal') => {
    modalId.value = _item.id
    modalTitulo.value = _titulo
    form.value = { ..._item }

    form.value.diasPrestacaoContas = calcularDiferencaEmDias(_item.vigencia_prestacao_contas)
    form.value.alertaPrestacaoContas = form.value.diasPrestacaoContas <= 0 ?? true
    alertaAtraso.value = form.value.alertaPrestacaoContas


    setTimeout(() => {
        const modal = new bootstrap.Modal(document.getElementById(_item.id));
        modal.show();
    }, 100);


});


/*****************************************************************
 * Filtros
 *****************************************************************/
const filtrar = (async () => {

    exibirLoading("Pesquisando...");
    botaoDesabilitado.value = true;

    Inertia.visit(route("convenios.index"), {
        method: "get",
        data: props.filtro,
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
        },
        onError: (errors) => {
            for (let [key, value] of Object.entries(errors)) {
                exibirAlerta2('', value, "error");
            }
        },
        onFinish: () => {
            botaoDesabilitado.value = false;
            fecharLoading();
        },
    });


});

/*****************************************************************
 * Orgões
 *****************************************************************/

const listaOrgoes = ref([]);
const carregarOrgoes = (async () => {
    try {
        const response = await axios.get(route('orgaos.lista'));
        listaOrgoes.value = response.data;

    } catch (error) {
        console.log('Erro ao processar as requisições:', error.message);
    }
});


onMounted(async () => {

    habilitarToolTips()
    carregarOrgoes()

});



/*****************************************************************
 *  Deletar
 *****************************************************************/
const deletar = async (_item) => {

    const { isConfirmed } = await exibirConfirmacao("Deseja confirmar a exclusão?");
    if (!isConfirmed) return;

    exibirLoading('Aguarde...');

    Inertia.visit(route("convenios.destroy", _item.id), {
        method: "delete",
        data: _item,
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {

            exibirAlerta2("Removido com sucesso!", _item.numero, "success");
        },
        onError: (errors) => {
            for (let [key, value] of Object.entries(errors)) {
                exibirAlerta2(key, value, "error");
            }
        },
        onFinish: () => {
     fecharLoading();
        },
    });


}
</script>
