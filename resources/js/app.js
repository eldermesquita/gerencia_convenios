// ######## Templete  AdminKit e bootstrap ####
import './bootstrap';

import "../adminkit/src/js/modules/bootstrap";
import "../adminkit/src/js/modules/sidebar";
import "../adminkit/src/js/modules/theme";
import "../adminkit/src/js/modules/feather";
import "../adminkit/src/js/modules/flatpickr";
import "../adminkit/src/js/modules/vector-maps";

// ######## Inertia js ####
import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress';
import vSelect from "vue-select";


// ######## Rotas do Laravel no JavaScript ####
import { Ziggy } from './ziggy';

//######### Acessar variáveis de ambiente do .env injetadas por meio do objeto:import.meta.env ##############
import.meta.env.VITE_SENTRY_DSN_PUBLIC

import {Tooltip, Popover, Alert } from "bootstrap";

  const nomeDoApp = window.document.getElementsByTagName('title')[0]?.innerText || 'e-Developer';

  createInertiaApp({
    title: (title) => `${title} - ${nomeDoApp}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
     /**
         * Sets up Inertia.
         *
         * @param {object} setup
         * @param {Element} setup.el
         * @param {object} setup.app
         * @param {object} setup.props
         *
     **/
    setup({ el, App, props, plugin }) {
      return createApp({ render: () => h(App, props) })
        .use(plugin, Ziggy)
        .component("Head", Head)
        .component("Link", Link)
        .component("v-select", vSelect)
        .mixin({
            methods: {
                route,
            },
        })
        .mount(el)
    },
  });

    // config barra de progresso loading... .
  InertiaProgress.init({
    // O atraso após o qual a barra de progresso aparecerá, em milissegundos...
       delay: 250,
      // A cor da barra de progresso...
       color: "#50a",
      // Se deve incluir os estilos NProgress padrão...
       includeCSS: true,
      // Se o spinner NProgress será mostrado...
       showSpinner: true
  });

document.querySelectorAll('[data-bs-toggle="popover"]').forEach((popover) => {
    try {
        new Popover(popover);
    } catch (e) {
        console.log("popover", e);
    }
});




   /*  const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );

    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    }); */
