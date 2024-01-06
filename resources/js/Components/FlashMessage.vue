<template>

    <div v-show="show" :class="`alert alert-${flash?.alert}  alert-dismissible fade show`" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        <div class="alert-icon">
            <template v-if="flash?.alert === 'error' || flash?.alert === 'danger'">
                <i class="far fa-fw fa-bell"></i>
            </template>
            <template v-else-if="flash.alert === 'info'">
                <i class="far fa-fw fa-bell"></i>
            </template>
            <template v-else-if="flash.alert === 'warning'">
                <i class="far fa-fw fa-bell"></i>
            </template>
            <template v-else-if="flash.alert === 'success'">
                <i class="far fa-fw fa-bell"></i>
            </template>
        </div>

        <div class="alert-message" v-if="flash.message !== null">
            <strong> {{ flash.message }}</strong>
        </div>

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
            show: false,
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
                }, 15000);
            },

            deep: true, // Observa alterações profundas dentro do objeto errors
            immediate: true, // Chama o handler imediatamente após a criação do componente
        },
    },

    methods: {
        hide() {
            this.show = false;
            $("#flash-message").hide();
        },
    },
};
</script>
