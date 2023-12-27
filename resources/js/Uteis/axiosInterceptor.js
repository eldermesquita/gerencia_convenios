import axios from "axios";
import {
    exibirAlerta,
    exibirAlerta2,
    exibirLoading,
    fecharLoading,
} from "./dialogo.js";

// Cria uma instância do Axios
const axiosInstance = axios.create();

// Interceptador de request
axiosInstance.interceptors.request.use(
    (config) => {
        // Verifica se o navegador está online
        if (!navigator.onLine) {
            exibirAlerta("Sem conexão com a internet", "Ops!", "warning");
            return Promise.reject("Sem conexão com a internet");
        }
        // Antes de fazer a requisição, exibe o loading
        exibirLoading("Aguarde...");
        // Configuração do timeout em milissegundos (por exemplo, 20 segundos)
        // config.timeout = 20000;
        return config;
    },
    (error) => {
        // Se a requisição falhar, exibe um alerta de erro
        exibirAlerta(`${error.message} `, `Erro na requisição`, "error");
        exibirAlerta2(`${error.message} `, `Erro na requisição`, "error");
        return Promise.reject(error);
    }
);

// Interceptador de response
axiosInstance.interceptors.response.use(
    (response) => {
        // Após a resposta, fecha o loading
        fecharLoading();
        return response;
    },
    (error) => {
        // Trata erros de timeout
        if (
            error.code === "ECONNABORTED" &&
            error.message.includes("timeout")
        ) {
            // Timeout atingido
            exibirAlerta("Timeout da requisição atingido", "Ops!", "warning");
            exibirAlerta2("Ops!", "Timeout da requisição atingido", "warning");
        }
        exibirAlerta(
            ` ${error.response.data.detail}, ${error.message} `,
            `Erro na resposta ${error.code}`,
            "error"
        );
        exibirAlerta2(
            `Erro na resposta!  ${error.code}`,
            ` ${error.response.data.detail}, ${error.message} `,
            "error"
        );
        return Promise.reject(error);
    }
);

export default axiosInstance;
