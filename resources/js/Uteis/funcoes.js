import moment from "moment-timezone";
import "moment/locale/pt-br.js";
 const utils = {

    formatarDataPtBr(_data) {
        const dataMoment = moment(_data)
        const dataFormatada = dataMoment.tz("America/Sao_Paulo").format('DD/MM/YYYY');
        return dataFormatada
        },

     formatarMoedaPtBr(_valor) {
            return Intl.NumberFormat("pt-BR", {
                style: "currency",
                currency: "BRL",
            }).format(_valor || 0);
        },
     formatarMoedaPtBr(_valor) {
            return Intl.NumberFormat("pt-BR", {
                style: "currency",
                currency: "BRL",
            }).format(_valor || 0);
        },

};
export const { formatarDataPtBr , formatarMoedaPtBr } = utils;
export default utils;
