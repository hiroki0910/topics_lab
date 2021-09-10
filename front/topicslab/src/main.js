import { createApp } from 'vue'
import App from './App.vue'

import PrimeVue from 'primevue/config'
import Card from 'primevue/card'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import Fieldset from 'primevue/fieldset'
import Textarea from 'primevue/textarea'
import 'primevue/resources/themes/saga-blue/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
import router from './router'

// import 'primeflex/primeflex.css'
// import 'primeflex/src/_variables.scss'
// import 'primeflex/src/_grid.scss'
// import 'primeflex/src/_formlayout.scss'
// import 'primeflex/src/_display.scss'
// import 'primeflex/src/_text.scss'
// import 'primeflex/src/flexbox/_flexbox.scss'
// import 'primeflex/src/_spacing.scss'
// import 'primeflex/src/_elevation.scss'

const app = createApp(App).use(router)
app.mount('#app')
app.use(PrimeVue)

app.component('Card', Card)
app.component('Button', Button)
app.component('InputText', InputText)
app.component('Fieldset', Fieldset)
app.component('Textarea', Textarea)
