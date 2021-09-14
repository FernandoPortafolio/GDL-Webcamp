require('./bootstrap')

Vue.component('eliminar-evento', require('./components/EliminarEvento.vue').default)
Vue.component('eliminar-categoria', require('./components/EliminarCategoria.vue').default)
Vue.component('eliminar-invitado', require('./components/EliminarInvitado.vue').default)
Vue.component('eliminar-registrado', require('./components/EliminarRegistrado.vue').default)
Vue.component('eliminar-admin', require('./components/EliminarAdministrador.vue').default)
Vue.component('paquetes', require('./components/Paquetes.vue').default)

const app = new Vue({
    el: '#app',
})

require('./scripts/admin_plugins')
