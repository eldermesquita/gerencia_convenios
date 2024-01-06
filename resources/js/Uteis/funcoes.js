import moment from "moment-timezone";
import "moment/locale/pt-br.js";
const utils = {
    calcularDiferencaEmDias(_dataFormatBr) {
        // Converte a string de data para um objeto Date
        const partesData = _dataFormatBr.split("/");

        const dataFornecida = new Date(
            partesData[2],
            partesData[1] - 1,
            partesData[0]
        );
        // Obtém a data atual
        const dataAtual = new Date();
        // Calcula a diferença em milissegundos
        const diferencaEmMilissegundos = dataFornecida - dataAtual;
        // Converte a diferença em milissegundos para dias
        const diferencaEmDias = Math.ceil(
            diferencaEmMilissegundos / (1000 * 60 * 60 * 24)
        );
        return diferencaEmDias;
    },
    formatarDataDB(_dataFormatBr) {
        const partesData = _dataFormatBr.split("/");
        const dataFormatada = new Date(
            partesData[2],
            partesData[1] - 1,
            partesData[0]
        );

        const ano = dataFormatada.getFullYear();
        const mes = String(dataFormatada.getMonth() + 1).padStart(2, "0");
        const dia = String(dataFormatada.getDate()).padStart(2, "0");

        return `${ano}-${mes}-${dia}`;
    },
    formatarDataPtBr(_data) {
        const dataMoment = moment(_data);
        const dataFormatada = dataMoment
            .tz("America/Sao_Paulo")
            .format("DD/MM/YYYY");
        return dataFormatada;
    },

    formatarMoedaPtBr(_valor) {
        /*         console.log("formatarMoedaPtBr", _valor);
         return Intl.NumberFormat("pt-BR", {
             style: "currency",
             currency: "BRL",
         }).format(_valor || 0);

let total = $('#cart-total-input').val();
                let valorTroco = (parseFloat(total) - parseFloat(valorRecebido)).toFixed(2);
                let valorRestante = (parseFloat(total) - parseFloat(valorRecebido)).toFixed(2);

                if(valorRestante < 0){
                    valorRestante = parseFloat(0).toFixed(2);
                }

                if(valorTroco < 0){
                    valorTroco = Math.abs(valorTroco);
                }

         */

        //  const valorString = _valor.toString();
        const valorNumerico = parseFloat(_valor.replace(/[^\d]/g, ""));
        const valor = valorNumerico.toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
            minimumFractionDigits: 2,
        });

        console.log("valorNumerico", valor);

        /*
         return valorNumerico.toLocaleString("pt-BR", {
             style: "currency",
             currency: "BRL",
             minimumFractionDigits: 2,
         });
          */
    },

    // é chamada durante o evento blur.
    formatarMoeda(_valor) {
        console.log("formatarMoeda", _valor);

        // Remove todos os caracteres não numéricos e converte para número
        const valorNumerico = parseFloat(_valor.replace(/[^\d]/g, ""));
        // Retorna o valor formatado como número
        return valorNumerico.toFixed(2);
    },
};
export const {
    formatarDataPtBr,
    formatarMoedaPtBr,
    formatarMoeda,
    calcularDiferencaEmDias,
    formatarDataDB,
} = utils;
export default utils;
