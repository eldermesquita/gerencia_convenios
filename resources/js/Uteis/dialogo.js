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
    showDuration: 300,
    hideDuration: 300,
    timeOut: 7000,
    timer: 5000,
    extendedTimeOut: 1000,
    hideEasing: "linear",
    hideMethod: "fadeOut",
    showEasing: "swing",
    showMethod: "fadeIn",
};


export function exibirAlerta(descricao = "", titulo = "", tipoMsg = "error") {
    return toastr[tipoMsg](titulo, descricao);
}

export function exibirLoading(titulo = "") {
    Swal.fire({
        allowEscapeKey: true,
        allowOutsideClick: () => !Swal.isLoading(),
        didOpen: () => {
            Swal.showLoading();
        },
        willOpen: () => {
            Swal.showLoading();
        },
        timerProgressBar: true,
        showConfirmButton: false,
        html: `<div class='flex-column justify-content-center align-items-center'>${
            titulo || "Aguarde..."
        }</div>`,
    }).then((result) => {
        Swal.close();
    });
}

export function fecharLoading() {
    Swal.close();
}

export function confirmarAcao(
    title = "Tem certeza?",
    text = "Não será possível desfazer esta operação!",
    confirmButtonText = "Sim",
    cancelButtonText = "Cancelar"
) {
    const swalWithBootstrapButtons = Swal.mixin({
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
}
