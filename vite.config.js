import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/sass/app.scss",
                "resources/js/app.js",
            ],
            refresh: true,
            // refresh: ['resources/views/**'],
            // buildDirectory: '/frontendAssets',
        }),
        vue(),

    ],
    // Padrão: público
    // Pasta servida como recurso estático. Os arquivos deste diretório serão servidos em / durante o desenvolvimento,
    //e serão copiados para o diretório raiz outDir durante a construção, sem conversão, e sempre serão copiados aqui.
    // O valor pode ser um caminho absoluto no sistema de arquivos ou relativo à raiz do projeto.
    // publicDir: path.resolve(__dirname, "public"),
    // Ao usar aliases para caminhos do sistema de arquivos, sempre use caminhos absolutos.
    //Caminhos relativos como valores de alias serão usados ​​como estão e não serão resolvidos para caminhos do sistema de arquivos.
    /* define: {
        // Defina as variáveis globais aqui
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',

        Popper: 'popper.js',
    },
 */
    resolve: {
        alias: {
            "@util": path.resolve(__dirname, "resources/js/Uteis"),
            "@components": path.resolve(__dirname, "resources/js/Components"),
            "@": path.resolve(__dirname, "resources/js"),
            ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),

        },
    },
    /* css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "./resources/css/app.css";`, // Importe seu arquivo de personalização do Bootstrap aqui, se necessário
            },
        },
    }, */
    server: {
        //  publicDir: 'public',
        // Especifique o nome do host do servidor
        host: "localhost",
        //* Nota: O Vite tentará automaticamente
        //a próxima porta disponível se a porta já estiver em uso, então esta pode não ser a porta real na qual o servidor acaba escutando.
        port: 10086,
        // Quando definido como verdadeiro, se a porta já estiver ocupada, sairá diretamente ao invés de tentar a próxima porta disponível
        strictPort: false,
        // tipo: boolean | https.ServerOptions
        // Habilita TLS + HTTP/2. Observe que somente TLS será usado quando a opção server.proxy também for usada.
        // Este valor também pode ser um objeto de opções passado para https.createServer().
        https: false,
        // Tipo: booleano | string
        // Abre automaticamente o aplicativo no navegador quando o servidor inicia
        open: false,
        // proxy de serviço local
        // Tipo: Record<string, string | ProxyOptions>
        // Configure regras de proxy personalizadas para o servidor de desenvolvimento.
        //Espere receber um objeto { key: options }. Se o valor da chave começar com ^, ele será interpretado como RegExp.
        proxy: {},
        cors: true,
        // tipo: booleano
        // Conteúdo relacionado: https://cn.vitejs.dev/guide/dep-pre-bundling.html
        // Defina como `true` para forçar as dependências a serem pré-construídas
        force: false,
        // Tipo: boolean | { protocol?: string, host?: string, port?: number, path?: string, timeout?: number, overlay?: boolean }
        // Desabilitar ou configurar o link HMR (para websocket HMR deve usar um endereço de servidor http diferente)
        // Defina `server.hmr.overlay` como `false` para desativar a sobreposição de erro do servidor
        hmr: false,
        // tipo: objeto
        // opções do monitor do sistema de arquivos passadas para `chokidar`
        // https://github.com/paulmillr/chokidar#api
        watch: {},
    },
    // configuração de construção
    css: {
        codeSplit: false, // Isso impede a divisão de código CSS em vários arquivos
    },

    build: {
        // especifique o caminho de saída (relativo ao diretório raiz do projeto)
        // outDir: path.resolve(__dirname, 'public'), // Diretório de saída para os arquivos de construção
        // assetsDir: 'css', // Diretório de assets dentro do diretório de saída
        // Por padrão, se outDir estiver no diretório raiz, o Vite limpará o diretório ao compilar.
        //Se outDir estiver fora do diretório raiz, um aviso será lançado para evitar a exclusão acidental de arquivos importantes.
        //Esta opção pode ser configurada para desligar este aviso. Esse recurso também está disponível por meio do parâmetro de linha de comando --emptyOutDir.
        write: true, // default: true se outDir estiver no diretório raiz
        minify: true,
        // Conteúdo relacionado: https://cn.vitejs.dev/guide/backend-integration.html
        // Quando definido como true, após a construção Um arquivo manifest.json será gerado,
        // mapeando nomes de arquivos de recursos que não possuem hash para suas versões com hash.
        //Ele pode fornecer o link de importação de recursos correto ao renderizar para algumas estruturas de servidor.
        manifest: true,
        sourcemap: true, // Gerando source maps para depuração
        // especifique o caminho de armazenamento de compilação de recursos estáticos (relativo a build.outDir)
        //assetsDir: "/", // padrão: assets
        // Recursos importados ou referenciados menores que esse limite serão embutidos como codificação
        // base64 para evitar solicitações http adicionais. Defina como 0 para desativar isso completamente.
        assetsInlineLimit: 4096, // Padrão: 4096 (4kb)
        // Ativar/desativar divisão de código CSS. Quando ativado, o CSS importado em um bloco assíncrono será embutido no próprio bloco assíncrono e inserido quando o bloco for carregado.
        // Se desabilitado, todo o CSS em todo o projeto será extraído em um arquivo CSS.
        cssCodeSplit: true, // default: true
        // ativar/desativar relatório de tamanho compactado brotli. A compactação de arquivos de saída grandes pode ser lenta, portanto, desabilitar esse recurso pode melhorar o desempenho da compilação para grandes projetos.
        emptyOutDir: false,
        chunkSizeWarningLimit: 1000, // Defina o limite desejado em kB
        // https://rollupjs.org/guide/en/#big- list- of-options
        // Personalize a configuração subjacente do pacote Rollup.
        // Esta é a mesma opção exportada do arquivo de configuração do Rollup e será mesclada com as opções de Rollup internas do Vite.
        //Consulte a documentação das opções de Rollup para obter mais detalhes. https://rollupjs.org/guide/en/#big-list-of-options
        rollupOptions: {
            /* input: {
                app: path.resolve(__dirname, "resources/js/app.js"), // Caminho para o seu arquivo principal do Vue
            }, */

            // external: ['jquery'], // Defina o jQuery como um recurso externo
            output: {
                chunkFileNames: 'js/[name]-[hash].js',
                entryFileNames: 'js/[name]-[hash].js',
                assetFileNames: 'css/[name]-[hash].[ext]',
            },

        },
    },
});