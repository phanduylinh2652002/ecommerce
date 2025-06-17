import {createApp, DefineComponent, h} from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from '@/Layouts/index.vue'
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import StyleClass from 'primevue/styleclass'
import '../sass/app.scss';
import 'primeicons/primeicons.css';
import router from './router/index'

import Button from "primevue/button"
import Toast from 'primevue/toast';
import SelectButton from "primevue/selectbutton";
import InputText from 'primevue/inputtext'
import Password from 'primevue/password'
import Checkbox from 'primevue/checkbox'

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
            .use(router)
            .component('Button', Button)
            .component('Toast', Toast)
            .component('SelectButton', SelectButton)
            .component('InputText', InputText)
            .component('Password', Password)
            .component('Checkbox', Checkbox)
            .directive('styleclass', StyleClass)
            .mount(el)
    },
})
