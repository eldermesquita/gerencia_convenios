<template>
        <div class="row m-4">
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
</template>

<script>
export default {
    name: "FlashMessage",
    data() {
        return {
            duracao: 2000,
            isVisible: true,
        };
    },
    created() {
    // Define um temporizador para esconder o componente após a duração especificada
    setTimeout(() => {
      this.isVisible = false;
    }, this.duracao || 20000); // Define a duração padrão como 20000 (20 segundos)
  },

};
</script>
