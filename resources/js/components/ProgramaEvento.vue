<template>
  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2 class="justify-center separador">Programa del evento</h2>

        <nav class="menu-programa">
          <a
            href="#"
            v-for="categoria in categorias"
            :key="categoria.id"
            @click.prevent="cambiarTab(categoria.categoria)"
            :class="{'activo' : currentCategory == categoria.categoria}"
          >
            <i :class="categoria.icono"></i>
            {{ categoria.categoria }}
          </a>
        </nav>

        <ul
          v-for="(evento, index) in eventos"
          :key="index"
          class="info-curso"
          :class="index == currentCategory ? 'show' : 'hide'"
        >
          <li class="detalle-evento" v-for="(taller, index) in evento" :key="index">
            <h3>{{ taller.evento }}</h3>
            <p>
              <i class="far fa-clock"></i>
              {{ taller.hora }}
            </p>
            <p>
              <i class="far fa-calendar"></i>
              {{ taller.fecha }}
            </p>
            <p>
              <i class="far fa-user"></i>
              {{ taller.invitado.nombre}}
              {{ taller.invitado.apellido}}
            </p>
          </li>
          <div class="justify-rigth">
            <a href="/calendario" class="btn btn-primario">Ver Todos</a>
          </div>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['categorias', 'eventos'],
    data() {
      return {
        currentCategory: 'Seminarios',
      }
    },
    methods: {
      cambiarTab(categoria) {
        this.currentCategory = categoria
      },
    },
  }
</script>


