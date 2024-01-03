<template>
    <div class="p-0 container-fluid">
        <div>
            <FlashMessage :flash="flash" />
        </div>
        <h1 class="mb-3 h3">Novo convênios</h1>
        <div class="card">
            <div class="card-header">
                <form autocomplete="on" novalidate class="mb-3" @submit.prevent="filtrar()">
                    <div class="row">
                        <div class="col-4 mb-3"></div>
                        <div class="mb-3 form-floating">
                            <select class="form-select" ref="refOrgaoId" v-model="filtro.orgaoId"
                                aria-label="Selecione o órgão">
                                <option selected> -- Selecione -- </option>
                                <option v-for="(item, index) in  listaOrgoes" :key="index" :value="item.id"
                                    :selected="filtro.orgaoId === item.id">
                                    {{ item.nome }}
                                </option>
                            </select>
                            <label for="orgaoId"> Órgão</label>

                        </div>
                    </div>
                    <!--   <div class="col-2 mb-3">
                            <label for="virgencia">Início Virgência</label>
                            <input type="date" class="form-control" v-model="filtro" />
                        </div>
                        <div class="col-2 mb-3">
                            <label for="virgenciaPrestacaoContas">Fim Virgência</label>
                            <input type="date" class="form-control" v-model="form.fim_vigencia" />
                        </div>
                        <div class="col-2 mb-3">
                            <label for="numero">Nº Convênio</label>
                            <input type="text" class="form-control" v-model="form.numero" />
                        </div>
                        <div class="col-2 mb-3">
                            <label for="numero_processo">Nº Processo</label>
                            <input type="text" class="form-control" v-model="form.ano" />
                        </div>
                         <div class="col-3 mb-3">
                                        <label for="contrato_id">Contrato</label>

                                        <vSelect v-model="formFiltro.contratoId"
                                           placeholder="-Selecione-"
                                            :clearable="true"
                                            :searchable="true"
                                            :filterable="true"
                                            :reduce="contratos => contratos.id"
                                            label="numero"
                                            :options="contratos"
                                            >
                                            <template v-slot:no-options="{ search, searching }">
                                                      <template v-if="searching" >
                                                          <span class="alert alert-warning small" >
                                                             Nenhum resultado:  <em> <b> {{ search }} </b></em >.
                                                          </span>
                                                        </template>
                                            </template>
                                        </vSelect>
                                    </div> -->


                    <div class="ms-auto text-end mt-n1">
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btns-no-actions m-1"
                                    :disabled="botaoDesabilitado">
                                    <span v-if="botaoDesabilitado" class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true">
                                    </span>
                                    <i v-else class="fa-solid fa-magnifying-glass"></i>
                                    <span v-if="!botaoDesabilitado"> Pesquisar </span>
                                    <span v-else> Pesquisando... </span>
                                </button>

                                 <Link as="button"
                            v-if="route().params.search ||
                                props.filtro.numero ||
                                props.filtro.inicioVigencia ||
                                props.filtro.fimVigencia  ||
                                props.filtro.virgenciaPrestacaoContas ||
                                (props.filtro.orgaoId && $props.filtro.orgaoId !== 0) "
                                    preserve-state
                                    preserve-scroll
                                    class="btn btn-secondary btns-no-actions mr-1"
                                 :href="route('convenios.index')" replace
                          ><i class="fa-solid fa-eraser"></i>
                            Limpar
                          </Link>

                          <Link
                            :href="route('convenios.create')"
                            class="btn btn-success btns-no-actions"
                            style="margin-left: 5px"
                          ><i class="fa-solid fa-add"></i>
                            Novo
                          </Link>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped table-hover" aria-describedby="listaConvenio">
                    <thead>
                        <tr>
                            <th class="text-center">Nº</th>
                            <th class="text-center">Ano </th>
                            <th class=" text-center">Início vigência</th>
                            <th class=" text-center">Fim vigência</th>
                            <th class="">Prestação de contas</th>
                            <th class="d-none d-md-table-cell text-center">Valor repasse</th>
                            <th class="d-none d-md-table-cell text-center">Valor contrapartida</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(convenio, index) in  convenios.data" :key="index">
                            <td class="d-none d-md-table-cell">{{ convenio.numero }}</td>
                            <td class="d-none d-md-table-cell text-nowrap">{{ convenio.ano }}</td>
                            <td>{{ convenio.inicio_vigencia }} </td>
                            <td>{{ convenio.fim_vigencia }} </td>
                            <td>{{ convenio.vigencia_prestacao_contas }} </td>
                            <td class="d-none d-md-table-cell text-center">{{ convenio.valor_repasse }}</td>
                            <td class="d-none d-md-table-cell text-center">{{ convenio.valor_contrapartida }}</td>
                            <td class="text-nowrap">
                                <a href="javascript:void(0);" class="btn btn-sm btn-info mr-2 " data-toggle="tooltip"
                                    data-placement="top" :title="'Excluir'" :data-original-title="'Excluir'">
                                    <i class="fas fa-edit fa-1x "></i>
                                </a>
                                <a href="javascript:void(0);" @click="deletar(convenio)" data-toggle="tooltip"
                                    data-placement="top" :title="'Excluir'" :data-original-title="'Excluir'"
                                    class="btn btn-sm btn-danger   mr-2">
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
        </div>
    </div>
</template>
<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3'
import { ref, defineProps, computed, onMounted } from 'vue';
import FlashMessage from "@/Components/FlashMessage.vue";
import Paginacao from "@/Components/Pagination.vue";
import { exibirAlerta, exibirAlerta2, exibirLoading, fecharLoading } from '@/Uteis/dialogo';
import axios from '@/Uteis/axiosInterceptor';

const props = defineProps(['convenios', 'errors', 'flash', 'auth', 'filtro']);

const botaoDesabilitado = ref(false);


/*****************************************************************
 * Paginação
 *****************************************************************/
const ocultarPaginacao = computed(() => {
    return !props.convenios.prev_page_url && !props.convenios.next_page_url;
});


const filtrar = (async () => {
    /*  try {
        const response = await axios.get(route('convenios.index', props.filtro));

     } catch (error) {
         console.log('Erro ao processar as requisições:', error.message);
     } */

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

const listaOrgoes = ref([]);

onMounted(async () => {
    try {
        exibirLoading("Aguarde...");
        const response = await axios.get(route('orgaos.lista'));
        listaOrgoes.value = response.data;

    } catch (error) {
        console.log('Erro ao processar as requisições:', error.message);
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
        data: form.value,
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            exibirAlerta("Salvo com sucesso!", form.value.numero, "success");
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
