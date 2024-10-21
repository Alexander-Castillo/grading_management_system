import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import vuetify from './Plugins/vuetify.js';
import Layout from './Components/Layout.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(vuetify)
      .component('Link', Link)
      .mount(el)
  },
})