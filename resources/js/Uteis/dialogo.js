import Swal from "sweetalert2";
import toastr from "toastr";
toastr.options = {
    showConfirmButton: false,
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    progressClass: "toast-progress",
    positionClass: "toast-bottom-right",
    rtl: false,
    tapToDismiss: true,
    preventDuplicates: false,
    onclick: null,
    showDuration: 17300,
    hideDuration: 17300,
    timeOut: 17000,
    timer: 75000,
    extendedTimeOut: 17000,
    hideEasing: "linear",
    hideMethod: "fadeOut",
    showEasing: "swing",
    showMethod: "fadeIn",
};
/*
 * toast-top-left, toast-top-center, toast-top-right, toast-top-full-width,
 * toast-bottom-left, toast-bottom-center, toast-bottom-right, toast-bottom-full-width
 */
export default {
    success(
        title = "",
        text = "",
        position = "center",
        showConfirmButton = true,
        timer = 2000
    ) {
        Swal.fire({
            position,
            icon: "success",
            title,
            text,
            showConfirmButton,
            timer,
        });
    },

    async alert(text = "", title = "", autoClose, icone = "error") {
        return Swal.fire({
            icon: icone,
            title,
            text,
            timer: autoClose ? 1500 : null,
        });
    },

    async toastr(text = "", title = "", tipoMsg = "success") {
        return toastr[tipoMsg](title, text);
    },

    async toastSwal(title = "", text = "", icone = "success") {
        const toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        return toast.fire({
            title,
            text,
            icon: icone,
        });
    },

    loading(title = "") {
        Swal.fire({
            //title,
            allowOutsideClick: false,
            allowEscapeKey: true,
            allowOutsideClick: () => !Swal.isLoading(),
            /*  onBeforeOpen: () => {
                Swal.showLoading();
            }, */
            didOpen: () => {
                Swal.showLoading();
            },
            /*  width: 400,
            padding: "3em", */
            timerProgressBar: true,
            showConfirmButton: false,
            html: `<div class='flex-column justify-content-center align-items-center'>${title ? title : 'carregando...'}</div>`,
        }).then((result) => {
            Swal.close();
            if (result.isConfirmed) {
                Swal.fire({
                    title: `${result}'s avatar`,
                });
            }
        });
    },

    async confirm(
        title = "Tem certeza?",
        text = "Não será possível desfazer esta operação!",
        confirmButtonText = "Sim",
        cancelButtonText = "Cancelar"
    ) {
        const classes = "";
        const swalWithBootstrapButtons = Swal.mixin({
            /* customClass: {
                confirmButton: `${classes} `,
                cancelButton: `${classes} `,
            }, */
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            buttonsStyling: true,
        });

        return swalWithBootstrapButtons.fire({
            title,
            text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText,
            cancelButtonText,
            reverseButtons: true,
        });
    },

    close() {
        Swal.close();
    },
};
