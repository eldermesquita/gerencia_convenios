<template>
    <!--  <div class="row m-4">
            <Alert :type="$page.props.flash.alert" class="alert-dismissible" role="alert"  :duration="duracao" >
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-icon">
                    <i class="fa-regular fa-bell  fa-shake"></i>

                </div>
                <div class="alert-message">
                    <i class="fa-solid fa-check"></i>
                     {{ $page.props.flash.message }}
                </div>
            </Alert>
        </div>
 -->


    <div v-show="exibir" :class="`alert alert-${flash.alert}  alert-dismissible fade show`">

        <button @click="hide()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span><i class="fas fa-times" aria-hidden="true"></i></span>
        </button>

        <h5 v-if="flash.alert === 'error' || flash.alert === 'danger'">
            <i class="icon fas fa-ban" aria-hidden="true"></i> Error!
        </h5>
        <h5 v-else-if="flash.alert === 'info'">
            <i class="icon fas fa-info" aria-hidden="true"></i>
            Informacão!
        </h5>
        <h5 v-else-if="flash.alert === 'warning'">
            <i class="icon fas fa-exclamation-triangle" aria-hidden="true"></i>
        </h5>
        <h5 v-else-if="flash.alert === 'success'">
            <i class="icon fas fa-check" aria-hidden="true"></i>
        </h5>

        <template v-if="flash.message !== null">
            {{ flash.message }}
        </template>


    </div>
</template>

<script>
export default {
    name: "FlashMessage",
    props: {
        flash: Object,
    },
    data() {
        return {
            duracao: 2000,
            isVisible: true,
            exibir: false,
        };
    },
    watch: {
        flash: {
            handler(newFlash, oldFlash) {

                // Verifica se o objeto é nulo ou vazio
                if (newFlash?.message !== null) {
                    this.show = true;
                }
                // Define um temporizador para ocultar o alerta após 4 segundos
                setTimeout(() => {
                    this.show = false;
                }, 7000);
            },

            deep: true, // Observa alterações profundas dentro do objeto errors
            immediate: true // Chama o handler imediatamente após a criação do componente

        },
    },
    created() {
        // Define um temporizador para esconder o componente após a duração especificada
        setTimeout(() => {
            this.isVisible = false;
        }, this.duracao || 20000); // Define a duração padrão como 20000 (20 segundos)
    },

    methods: {
        hide() {
            this.exibir = false;
            $("#flash-message").hide();

        },
    },

};
</script>
