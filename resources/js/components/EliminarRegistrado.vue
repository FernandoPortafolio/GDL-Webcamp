<template>
  <button href="#" class="btn bg-red btn-flat m-lg-2" @click.prevent="eliminarInvitado">
    <i class="fa fa-trash text-white"></i>
  </button>
</template>

<script>
  export default {
    props: ['registradoId'],
    methods: {
      async eliminarInvitado() {
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
            axios
              .delete(`/admin/registrados/${this.registradoId}`)
              .then((resp) => {
                const tr = document.querySelector(`#tr-${this.registradoId}`)
                tr.parentNode.removeChild(tr)
                Swal.fire('Eliminado!', resp.data, 'success')
              })
              .catch((error) => {
                console.log(error.response)
                Swal.fire('Error!', 'No puedes eliminar un registro pagado', 'error')
              })
          }
        })
      },
    },
  }
</script>

<style>
</style>