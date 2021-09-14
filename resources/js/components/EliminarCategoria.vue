<template>
  <button href="#" class="btn bg-red btn-flat m-lg-2" @click.prevent="eliminarCategoria">
    <i class="fa fa-trash text-white"></i>
  </button>
</template>

<script>
  export default {
    props: ['categoriaId'],
    methods: {
      async eliminarCategoria() {
        Swal.fire({
          title: '¿Estas seguro?',
          text: 'Esta acción no se puede deshacer',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar!',
        }).then((result) => {
          if (result.isConfirmed) {
            axios.delete(`/admin/categorias/${this.categoriaId}`).then((resp) => {
              const tr = document.querySelector(`#tr-${this.categoriaId}`)
              tr.parentNode.removeChild(tr)
              Swal.fire('Eliminada!', resp.data, 'success')
            })
          }
        })
      },
    },
  }
</script>

<style>
</style>