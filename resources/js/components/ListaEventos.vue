<template>
  <div>
    <h4>{{dia}}</h4>
    <div class="dias flex-resp">
      <div v-for="(talleres, tipo) in eventos" :key="tipo">
        <p>{{tipo}}</p>
        <label v-for="(evento) in talleres" :key="evento.id">
          <input :checked="checked(evento.id)" type="checkbox" name="registro[]" :value="evento.id" />
          <time>{{evento.hora}}</time>
          {{evento.evento}}
          <br />
          <span class="autor">{{evento.invitado.nombre}} {{evento.invitado.apellido}}</span>
        </label>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'ListaEventos',
    props: ['dia', 'eventos', 'registro_old'],
    methods: {
      checked(evento_id) {
        if (!this.registro_old) return false
        return this.registro_old.includes(evento_id.toString()) 
      },
    },
  }
</script>

<style>
</style>