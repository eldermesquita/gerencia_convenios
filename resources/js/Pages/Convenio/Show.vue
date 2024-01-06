use GuzzleHttp\Promise\Promise;
<template>
    <div class="p-0 container-fluid">
             <form>
                    <div class="row">
                        <div class=" col-md-6">
                            <div class=" form-floating">
                                <input type="text" class="form-control-plaintext" readonly :value="form.processo?.orgao?.nome">
                                <label for="orgao_id"> Órgão Proponente </label>
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class=" form-floating">
                                <input type="text" class="form-control-plaintext" readonly :value="form.numero">
                                <label for="numero">Número do convênios </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class=" form-floating">
                                <input type="text" class="form-control-plaintext" readonly :value="form.ano">
                                <label for="ano">Ano do convênios</label>
                            </div>
                        </div>


                    </div>
                    <div class="row mb-4">
                        <fieldset class="border">
                            <legend class="float-none w-auto  text-small"> Processo </legend>
                            <div class="row">
                                <div class=" col-md-3">
                                    <div class=" form-floating">
                                        <input type="text" class="form-control-plaintext" readonly :value="form.processo?.licitado ? 'SIM' : 'NÃO'">
                                        <label for="licitado"> Licitado </label>
                                    </div>
                                </div>

                             <div class=" col-md-3">
                                <div class=" form-floating">
                                    <input type="text" class="form-control-plaintext" readonly :value="form.processo?.modalidade">
                                    <label for="modalidade"> Modalidade </label>
                                </div>
                            </div>

                                 <div class=" col-md-4">
                                    <div class=" form-floating">
                                        <input type="text" class="form-control-plaintext" readonly :value="form.processo?.numero">
                                        <label for="ano_processo"> Número do processo</label>
                                    </div>
                                </div>
                            <div class=" col-md-2">
                                <div class=" form-floating">
                                    <input type="text" class="form-control-plaintext" readonly :value="form.processo?.ano">
                                    <label class="form-label" for="numero_processo">Ano do processo </label>
                                </div>
                            </div>

                            </div>

                        </fieldset>
                    </div>
                    <div class="row mb-4">
                        <fieldset class="border">
                            <legend class="float-none w-auto  text-small">Datas</legend>
                            <div class="row">
                                <div class=" col-lg-4">
                                    <div class=" form-floating">
                                        <input type="text" class="form-control-plaintext" readonly
                                            :value="form.inicio_vigencia">
                                        <label class="form-label" for="inicio_vigencia">Início da vigência</label>
                                    </div>
                                </div>
                                <div class=" col-lg-4">
                                    <div class=" form-floating">
                                        <input type="text" class="form-control-plaintext" readonly :value="form.fim_vigencia">
                                        <label class="form-label" for="fim_vigencia">Fim da vigência</label>
                                    </div>
                                </div>
                                <div class=" col-lg-4">
                                   <label class="form-label" for="vigencia_prestacao_contas">Limite da prestação contas</label>
                                    <div class="input-group mb-3">
                                        <div :class="alertaAtraso ? 'badge bg-danger' : 'badge bg-primary'">{{ form.vigencia_prestacao_contas }}</div>
                                        <span :class="alertaAtraso ? 'badge bg-danger' : 'badge bg-primary'">{{ form.diasPrestacaoContas }} dias {{ alertaAtraso ? 'ATRASADO' : '' }} </span>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="row mb-4">
                        <fieldset class="border ">
                            <legend class="float-none w-auto  text-small">Valores</legend>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class=" form-floating">
                                        <input type="text" :value="form.valor_repasse" class="form-control-plaintext"
                                            readonly />
                                        <label class="form-label" for="valor_repasse">Valor de repasse:</label>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class=" form-floating">
                                        <input type="text" :value="form.valor_contrapartida" class="form-control-plaintext"
                                            readonly />
                                        <label class="form-label" for="valor_contrapartida">Valor Contrapartida:</label>
                                    </div>
                                </div>

                            </div>

                        </fieldset>
                    </div>
                    <div class="mb-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                         <div class=" form-floating">
                            <textarea class="form-control-plaintext" readonly  rows="4"
                            :value="form.objeto"></textarea>
                            <label class="form-label" for="objeto">Objeto:</label>
                         </div>
                    </div>
                </form>
    </div>
</template>
<script setup>

import { ref, defineProps, onUpdated  } from 'vue';

const props = defineProps(['itens']);
const form = ref({});
const alertaAtraso = ref(false);
onUpdated(async () => {
     form.value = { ...props.itens }
     alertaAtraso.value = form.value.alertaPrestacaoContas
});

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
