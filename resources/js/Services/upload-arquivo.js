import api from "@/Services/api.js";

export interface IFile {
    id: string;
    name: string;
    readableSize: string;
    uploaded ? : boolean;
    preview: string;
    file: File | null;
    progress ? : number;
    error ? : boolean;
    url: string;
}

const [uploadedFiles, setUploadedFiles] = useState < IFile[] > ([]);

const updateFile = useCallback((id, data) => {
    setUploadedFiles((state) =>
        state.map((file) => (file.id === id ? {...file, ...data } : file))
    );
}, []);

const processUpload = useCallback(
    (uploadedFile: IFile) => {
        const data = new FormData();
        if (uploadedFile.file) {
            data.append("file", uploadedFile.file, uploadedFile.name);
        }

        api
            .post("posts", data, {
                onUploadProgress: (progressEvent) => {
                    let progress = Math.round(
                        (progressEvent.loaded * 100) / progressEvent.total
                    );

                    console.log(
                        `A imagem ${uploadedFile.name} está ${progress}% carregada... `
                    );

                    updateFile(uploadedFile.id, { progress });
                },
            })
            .then((response) => {
                console.log(
                    `A imagem ${uploadedFile.name} já foi enviada para o servidor!`
                );

                updateFile(uploadedFile.id, {
                    uploaded: true,
                    id: response.data._id,
                    url: response.data.url,
                });
            })
            .catch((err) => {
                console.error(
                    `Houve um problema ao fazer upload da imagem ${uploadedFile.name} no servidor AWS`
                );
                console.log(err);

                updateFile(uploadedFile.id, {
                    error: true,
                });
            });
    }, [updateFile]
);

// Utilizando axios
import axios from axios;

// Criando um FormData que armazena a imagem (arquivo)
const data = new FormData();
data.append("file", file, filename);

// Fazendo a requisição para o servidor com método POST
// Enviando o arquivo que está na variável data
// Passando um objeto de configuração que possui um método onUploadProgress
axios
    .post("https://my.server.com/posts", data, {
        onUploadProgress: (event) => {
            let progress = Math.round(
                (event.loaded * 100) / event.total
            );

            console.log(
                `A imagem ${filename} está ${progress}% carregada... `
            );
        },
    })
    .then((response) => {
        console.log(
            `A imagem ${filename} já foi enviada para o servidor!`
        );
    })
    .catch((err) => {
        console.error(
            `Houve um problema ao realizar o upload da imagem ${filename} no servidor AWS`
        );
        console.log(err);
    });