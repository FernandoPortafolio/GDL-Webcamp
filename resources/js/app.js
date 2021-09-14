require('./bootstrap')

Vue.component('programa-evento', require('./components/ProgramaEvento.vue').default)
Vue.component('paquetes', require('./components/Paquetes.vue').default)

const app = new Vue({
    el: '#app',
})

require('./scripts/header')
require('./scripts/invitados')
require('./scripts/index_page')
