// dialogo.js
import Swal from "sweetalert2";
import toastr from "toastr";

// Configuração adicional do Toastr
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

// Alerta Sweet Alert2
export function exibirAlerta(descricao = "", titulo = "", icone = "error") {
    return Swal.fire({
        icon: icone,
        title: titulo,
        text: descricao,
        timer: 7500,
    });
}
// Alerta Sweet Alert2
export function toastErrors(errors) {
    try {
        let html = Object.keys(errors).reduce((acc, key) => {
            let errs = errors[key].reduce(
                (acc2, err) => `${acc2} ${err} <br>`,
                ""
            );

            return acc + `Please check your ${key}, <br>${errs}`;
        }, "");
        Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            html,
        });
    } catch (err) {
        console.log(err);
    }
}

// Alerta Toastr
export function exibirAlerta2(
    descricao = "",
    titulo = "",
    tipoMsg = "success"
) {
    return toastr[tipoMsg](titulo, descricao);
}

// Alerta Toastr e Sweet Alert2
export function exibirAlerta3(titulo = "", descricao = "", icone = "success") {
    const toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        closeButton: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    return toast.fire({
        title: titulo,
        text: descricao,
        icon: icone,
    });
}

export function exibirConfirmacao(
    titulo = "Tem certeza?",
    descricao = "Não será possível desfazer esta operação!",
    confirmButtonText = "Sim",
    cancelButtonText = "Cancelar"
) {
    const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        buttonsStyling: true,
    });

    return swalWithBootstrapButtons.fire({
        title: titulo,
        text: descricao,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText,
        cancelButtonText,
        reverseButtons: true,
    });
}

export function exibirLoading(mensagem = "Aguarde...") {
    return Swal.fire({
        // title: mensagem,
        allowOutsideClick: false,
        showConfirmButton: false,
        allowEscapeKey: true,
        timerProgressBar: true,
        showConfirmButton: false,
        html: `<div class='flex-column justify-content-center align-items-center'>${
            mensagem ? mensagem : "Carregando..."
        }</div>`,
        allowOutsideClick: () => !Swal.isLoading(),
        willOpen: () => {
            Swal.showLoading();
        },
    });
}

export function fecharLoading() {
    Swal.close();
}
