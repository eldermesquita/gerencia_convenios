<template>
    <div class="container-fluid p-0">
          <FlashMessage  :flash="flash"  />
        <h1 class="h3 mb-3">Convênios</h1>
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <form autocomplete="on" novalidate class="mb-3" @submit.prevent="buscar()">
                                <div class="row">
                                    <div class="col-2 mb-3">
                                        <label for="virgencia">Virgência</label>
                                        <input type="date" class="form-control" v-model="formFiltro.virgencia" />
                                    </div>
                                    <div class="col-2 mb-3">
                                        <label for="virgenciaPrestacaoContas">Virgência</label>
                                        <input type="date" class="form-control" v-model="formFiltro.virgenciaPrestacaoContas" />
                                    </div>
                                    <div class="col-2 mb-3">
                                        <label for="numero">Nº Convênio</label>
                                        <input type="text" class="form-control" v-model="formFiltro.numero" />
                                    </div>
                                    <div class="col-2 mb-3">
                                        <label for="numero_processo">Nº Processo</label>
                                        <input type="text" class="form-control" v-model="formFiltro.numero_processo" />
                                    </div>
                                    <!-- <div class="col-3 mb-3">
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
                                    <div class="col-3 mb-3">
                                        <label for="orgao_id">Orgão: </label>
                                        <select class="form-control" v-model="formFiltro.orgaoId">
                                            <option value="0" selected="">-Selecione-</option>
                                            <option v-for="(item, index) in  orgaos" :key="index" :value="item.id"
                                                :selected="formFiltro.orgaoId === item.id">
                                                {{ item.nome }}
                                            </option>
                                        </select>
                                    </div>



                                </div>

                                <div class="ms-auto text-end mt-n1">
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btns-no-actions m-1"
                                                :disabled="enviandoForm" >

                                                <span v-if="enviandoForm" class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true">
                                                </span>

                                                <i v-else class="fa-solid fa-magnifying-glass"></i>

                                                <span v-if="!enviandoForm"> Pesquisar </span>
                                                <span v-else> Pesquisando... </span>
                                            </button>

                                            <button type="button" v-if="temFiltro"
                                                class="btn btn-secondary  btns-no-actions m-0"
                                                @click="limpaPesquisa()">
                                                <i class="fa-solid fa-eraser"></i>
                                                Limpar
                                            </button>



                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-striped table-hover"  aria-describedby="listaConvenio" >
                                <thead>
                                    <tr>
                                        <th class="d-none d-md-table-cell text-center">Nº Processo </th>
                                        <th class="d-none d-md-table-cell text-center">Nº Convênio</th>
                                        <th>Objeto</th>
                                        <th class="d-none d-md-table-cell text-center">Valor liberado</th>
                                        <th class="d-none d-md-table-cell text-center">Virgência</th>
                                        <th class="d-none d-md-table-cell text-center">Prestação de contas</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(convenio, index) in  convenios.data" :key="index">
                                        <td class="d-none d-md-table-cell">{{ convenio.numero }}</td>
                                        <td class="d-none d-md-table-cell text-nowrap">{{ convenio.numero_processo }}</td>
                                        <td >{{ convenio.objeto }} <p> <small> {{ convenio.orgao.nome }} </small></p></td>
                                        <td class="d-none d-md-table-cell text-center">{{ formatarMoedaPtBr(convenio.valor_liberado) }}</td>
                                        <td class="d-none d-md-table-cell text-center">{{ formatarDataPtBr(convenio.virgencia) }}</td>
                                        <td class="d-none d-md-table-cell text-center">{{  formatarDataPtBr(convenio.virgencia_prestacao_contas) }}</td>
                                        <td class="text-nowrap">
                                                <a href="javascript:void(0);" @click="notyf()" class="btn btn-sm btn-info "
                                                        data-toggle="tooltip" data-placement="top" :title="'Excluir'"
                                                        :data-original-title="'Excluir'">
                                                        <i class="fas fa-edit fa-1x "></i>
                                                    </a>
                                                <a href="javascript:void(0);" @click="deletar(convenio)"
                                                        data-toggle="tooltip" data-placement="top" :title="'Excluir'"
                                                        :data-original-title="'Excluir'" class="btn btn-sm btn-danger ">
                                                        <i class="fas fa-trash fa-1x "></i>
                                                    </a>
                                        	</td>
                                    </tr>

                                </tbody>



                                <tfoot v-if="!ocultarPaginacao">
                                        <tr>
                                            <td colspan="6">
                                                <!-- componente de paginação -->
                                                <div>
                                                    <Pagination :data="convenios" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

             <!--

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="-title mb-0">Contrato</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-0">

                                <div class="col-sm-9 col-xl-12 col-xxl-9">
                                    <strong>About me</strong>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua.</p>
                                </div>
                            </div>

                            <table class="table table-sm mt-2 mb-4">
                                <tbody>
                                    <tr>
                                        <th>Número</th>
                                        <td>FG/855545</td>
                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <td>The Wiz</td>
                                    </tr>
                                    <tr>
                                        <th>Virgência</th>
                                        <td>angelica@ramos.com</td>
                                    </tr>
                                    <tr>
                                        <th>Virgência de Execução</th>
                                        <td>31/12/2025</td>
                                    </tr>
                                    <tr>
                                        <th>Valor</th>
                                        <td>R$: 231.231,23</td>
                                    </tr>
                                    <tr>
                                        <th>Modalidade</th>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <strong>Aditivos</strong>

                            <ul class="timeline mt-2 mb-0">
                                <li class="timeline-item">
                                    <strong>Signed out</strong>
                                    <span class="float-end text-muted text-sm">30m ago</span>
                                    <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Created invoice #1204</strong>
                                    <span class="float-end text-muted text-sm">2h ago</span>
                                    <p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Dised invoice #1147</strong>
                                    <span class="float-end text-muted text-sm">3h ago</span>
                                    <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Signed in</strong>
                                    <span class="float-end text-muted text-sm">3h ago</span>
                                    <p>Curabitur ligula sapien, tincidunt non, euismod vitae...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Signed up</strong>
                                    <span class="float-end text-muted text-sm">2d ago</span>
                                    <p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                -->

            </div>
    </div>
</template>


<script>
import Pagination from "@/Components/Pagination.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import vSelect from "vue-select";
import alertas from '@/uteis/dialogo.js';
import  { formatarDataPtBr, formatarMoedaPtBr } from '@/uteis/funcoes';
import { Head, Link  } from "@inertiajs/inertia-vue3";

export default {
    name: "Convenio/Index",
    components: { Pagination, FlashMessage, Head, Link, vSelect },
    props: {
        convenios: Object,
        filtro: Object,
        errors: Object,
        flash: Object,
        auth: Object,
    },
    data() {
        return {
            alertas,
            contratos: [],
            orgaos: [],
            enviandoForm: false,
            form: {
                numero: '',
                objeto: '',
                numero_processo: '',
                valor_repasse: '',
                valor_contra_partida: '',
                valor_total: '',
                valor_liberado_concedente: '',
                valor_pago: '',
                valor_liberado: '',
                virgencia: '',
                virgencia_prestacao_contas: '',
                contrato_id: '',
                orgao_id: '',
            },

            formFiltro: {
                numero: '',
                virgencia: '',
                virgenciaPrestacaoContas: '',
                contratoId: '',
                orgaoId: '',
            },


        };
    },

    created() {
       /*  if ((typeof this.filtro !== 'undefined') && this.filtro) {
            this.formFiltro = Object.assign({}, this.filtro);
            this.formFiltro.contratoId = this.formFiltro.contratoId
            this.formFiltro.virgencia = this.formatarDataPtBr(this.filtro?.virgencia)
            this.formFiltro.virgenciaPrestacaoContas = this.formatarDataPtBr(this.filtro?.virgenciaPrestacaoContas)
        } */
    },
    computed: {
        ocultarPaginacao() {
            return !this.convenios.prev_page_url && !this.convenios.next_page_url;
        },
        temFiltro() {
             return Object.values(this.formFiltro).some(value => value !== '' &&  value !== null);
        },
    },
    mounted() {

        this.$nextTick(() => {
            try {
              axios.get(route('contratos.lista')).then(response => (this.contratos = response.data))
            } catch (error) {
                alertas.toastr("Ops! tem algo de errado", error, "error");
                console.log(error);
            }

            try {
              axios.get(route('orgaos.lista')).then(response => (this.orgaos = response.data))
             } catch (error) {
                alertas.toastr("Ops! tem algo de errado", error, "error");
                console.log(error);
            }

        }


        )

    },

    methods: {
        formatarDataPtBr,
        formatarMoedaPtBr,
        buscar() {
            this.enviandoForm = true;
            alertas.loading('pesquisando...');
            //Isso garante que somente os parâmetros preenchidos sejam enviados
            const filtro = {};
                for (const key in this.formFiltro) {
                    if (this.formFiltro[key] !== '' && this.formFiltro[key] !== null) {
                        filtro[key] =this.formFiltro[key];
                    }
                }

            this.$inertia.visit(route('convenios.index'), {
                method: 'get',
                data: filtro,
                preserveScroll: true,
                preserveState: true,
               // replace: true,
                onSuccess: () => {
                    alertas.close();
                    this.enviandoForm = false;
                 },
                onError: (errors) => {
                    for (let [key, value] of Object.entries(errors)) {
                        alertas.toastr(value, key, "error");
                    }
                },
                onFinish: () => {
                    alertas.close();
                    this.enviandoForm = false;
                },
            });

        },

        salvar() {
            this.form.put(route('user-password.update'), {
                errorBag: 'updatePassword',
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    /*  if (this.form.errors.password) {
                         this.form.reset('password', 'password_confirmation')
                         this.$refs.password.focus()
                     }
                     if (this.form.errors.current_password) {
                         this.form.reset('current_password')
                         this.$refs.current_password.focus()
                     } */
                }
            })
        },

        async deletar(_item) {
            const { isConfirmed } = await alertas.confirm("Deseja confirmar a exclusão?");
            if (!isConfirmed) return;

            alertas.loading('processando...');
           const  url= route("convenios.destroy",_item.id)
            this.$inertia.visit(url,{
                method: 'delete',
                data: _item,
                preserveScroll: true,
                preserveState: true,
                onSuccess: () => {
                    alertas.toastr("Removido com sucesso", _item.numero, "success");

                },
                onError: (errors) => {
                    for (let [key, value] of Object.entries(errors)) {
                        alertas.toastr(value, key, "error");

                    }
                },
                onFinish: () => {
                    alertas.close();
                },
            });
        },

      async  limpaPesquisa() {
         this.formFiltro = {
                 numero: '',
                virgencia: '',
                virgenciaPrestacaoContas: '',
                contratoId: '',
                orgaoId: '',
            }

           this.$inertia.visit(route('convenios.index'));

        },


        closeModal() {
            this.confirmingUserDeletion = false

            this.form.reset()
        },
    },
};
</script>
