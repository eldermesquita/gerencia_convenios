<template>
   <div class="p-0 container-fluid">
        <div v-show="$page.props.flash.message">
            <FlashMessage />
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
                                                <input type="text" class="mb-3 form-control"  required :class="{ 'is-invalid': errors.numero }" v-model="form.numero"
                                                    ref="refNumero"  placeholder="Nº ">
                                                <label for="numero">Número  <span class="text-danger">*</span></label>
                                                <div v-if="errors.numero" class="invalid-feedback">
                                                        {{ errors.numero }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <div class="mb-3 form-floating">
                                                <input type="text" class="mb-3 form-control"  required :class="{ 'is-invalid': errors.numero_processo }" v-model="form.numero_processo"
                                                    ref="refNumeroProcesso"  placeholder="Nº ">
                                                <label class="form-label" for="numero_processo">Número do processo: <span class="text-danger">*</span></label>
                                                <div v-if="errors.numero_processo" class="invalid-feedback">
                                                        {{ errors.numero_processo }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">

                                            <div class="mb-3 form-floating">
                                                <input type="date" class="mb-3 form-control"  required :class="{ 'is-invalid': errors.virgencia }" v-model="form.virgencia"
                                                    ref="refVirgencia"  placeholder="Nº ">
                                                <label class="form-label" for="virgencia">Virgência: <span class="text-danger">*</span></label>
                                                <div v-if="errors.virgencia" class="invalid-feedback">
                                                        {{ errors.virgencia }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <div class="mb-3 form-floating">
                                                <input type="date" class="mb-3 form-control"  required :class="{ 'is-invalid': errors.virgencia_prestacao_contas }" v-model="form.virgencia_prestacao_contas"
                                                    ref="refVirgenciaPrestacaoContas"  placeholder="Data ">
                                                <label class="form-label" for="virgencia_prestacao_contas">Virgência prestação contas: <span class="text-danger">*</span></label>
                                                <div v-if="errors.virgencia_prestacao_contas" class="invalid-feedback">
                                                        {{ errors.virgencia_prestacao_contas }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <div class="mb-3 form-floating">
                                            <input type="date" class="mb-3 form-control"  required :class="{ 'is-invalid': errors.virgencia_prestacao_contas }" v-model="form.virgencia_prestacao_contas"
                                                ref="refVirgenciaPrestacaoContas"  placeholder="Data ">
                                            <label class="form-label" for="virgencia_prestacao_contas">Virgência prestação contas: <span class="text-danger">*</span></label>
                                            <div v-if="errors.virgencia_prestacao_contas" class="invalid-feedback">
                                                    {{ errors.virgencia_prestacao_contas }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label class="form-label" for="inputAddress2">Address 2</label>
                                        <input type="text" class="mb-3 form-control form-control-lg" id="inputAddress2" placeholder="Apartment, studio, or floor">
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

                                        <button @click.prevent="salvar()" class="m-1 btn btn-primary" :disabled="enviandoForm">
                                                <i v-show="!enviandoForm" class="far fa-save"></i>
                                                <span v-if="enviandoForm" class="spinner-border spinner-border-sm text-info me-2" role="status" aria-hidden="true"> </span>
                                                <span v-if="!enviandoForm"> Salvar </span>
                                                <span v-else> Enviando... </span>

                                            </button>


                                    </div>
                                </form>
                            </div>
            </div>
     </div>
</template>

<script>
import FlashMessage from "@/Components/FlashMessage.vue";
import dialog from '@/Uteis/dialogo.js';
import  { formatarDataPtBr , formatarMoedaPtBr } from '@/Uteis/funcoes';
import { Head, Link } from "@inertiajs/inertia-vue3";
import { toast } from 'vue3-toastify';

export default {
    name: "Convenio/Create",
    components: { FlashMessage, Head, Link , toast },
    props: {
        convenios: Object,
        errors: Object,
        flash: Object,
        auth: Object,
    },
    data() {
        return {
            enviandoForm: false,
            form: this.$inertia.form({
                id:null,
                numero: null,
                objeto: null,
                numero_processo: null,
                valor_repasse: null,
                valor_contra_partida: null,
                valor_total: null,
                valor_liberado_concedente: null,
                valor_pago: null,
                valor_liberado: null,
                virgencia: null,
                virgencia_prestacao_contas: null,
                contrato_id: null,
                orgao_id: null,
            })

        };
    },

    created() {
        /* if (typeof this.eventosRealizados !== 'undefined') {
            this.form = Object.assign({}, this.eventosRealizados);
            this.form.data_inicio = this.funcoes.formatarData(this.eventosRealizados.data_inicio)
            this.form.data_fim = this.funcoes.formatarData(this.eventosRealizados.data_fim)
        } */
    },
    computed: {


    },
    mounted() {

    },

    methods: {
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



    },
};
</script>
