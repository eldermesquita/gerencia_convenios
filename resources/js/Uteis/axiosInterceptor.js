import axios from "axios";
import {
    exibirAlerta,
    exibirAlerta2,
    exibirLoading,
    fecharLoading,
} from "./dialogo.js";

// Cria uma instância do Axios
const axiosInstance = axios.create();

// Configurar interceptador para todas as requisições
axiosInstance.interceptors.request.use(
    (config) => {
        // Modificar configuração, se necessário

        // Verifica se o navegador está online
        if (!navigator.onLine) {
            exibirAlerta("Sem conexão com a internet", "Ops!", "warning");
            return Promise.reject("Sem conexão com a internet");
        }
        // Antes de fazer a requisição, exibe o loading
        //exibirLoading("Aguarde...");
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

// Configurar interceptador para todas as respostas
axiosInstance.interceptors.response.use(
    async (response) => {
        // Após a resposta, fecha o loading
        fecharLoading();
        return response;
    },
    async (error) => {
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


        // Tratar erros de resposta
        if (error.config && error.config._isRetry) {
            // Evitar ciclos infinitos em caso de retried
            console.log(
                "Resultado  requisição _isRetry:",
                error.config._isRetry
            );

            return Promise.reject(error);
        }

        // Tentar novamente a requisição
        try {
            const response = await axios.request({
                ...error.config,
                _isRetry: true, // Marcar a requisição para evitar ciclos infinitos
            });
            return Promise.resolve(response);
        } catch (retryError) {
            // Esperar que todas as tentativas (incluindo a original) se resolvam ou rejeitem
            const results = await Promise.allSettled([error, retryError]);
            // Lançar a primeira rejeição encontrada
            const rejection = results.find(
                (result) => result.status === "fulfilled"
            );

             exibirAlerta2(
                 `Erro na resposta!  ${rejection.value.request.responseURL}`,
                 ` ${rejection.value.response.data.message}`,
                  "error"
             );
                console.log(
                    "Erro na resposta!:",
                    rejection.value.response.data,
                    rejection.value.request.responseURL
                );


            return Promise.reject(rejection.reason);
        }
        // return Promise.reject(error);
    }
);

export default axiosInstance;
