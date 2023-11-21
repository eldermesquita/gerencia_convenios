import axios from "axios";
import toastr from 'toastr';
import { toast } from 'vue3-toastify';

// Pode ser algum servidor executando localmente:
// http://localhost:3000
// Cria uma instância do Axios com um interceptador
  // configurações comuns para todas as requisições

    /* const api = axios.create({
        timeout: 30000, // 30s,
        withCredentials: false,
  
    });
 // tratamento de respostas para todas as requisições
    api.interceptors.request.use( (response) => response,(error) => {
            if (error.response) {
                toast.error(error.response.data.message);
                toastr.error(error.response.data.message);
            } else if (error.request) {
                toast.error(error.response.data.message);
                toastr.error('Não foi possível conectar ao servidor');
            } else {
                toast.error(error.response.data.message);
                toastr.error('Ocorreu um erro ao processar sua solicitação');
            }
            return Promise.reject(error);
            }
    );
 */

export default api;
