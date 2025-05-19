import {createApp, DefineComponent, h} from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from '@/Layouts/index.vue'
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';

import Button from "primevue/button"

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob<DefineComponent>('./Pages/**/*.vue', { eager: true })

        const page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout

        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    options: {
                        darkModeSelector: '.light',
                    }
                }
            })
            .component('Button', Button)
            .mount(el)
    },
})
