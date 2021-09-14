<template>
  <button href="#" class="btn bg-red btn-flat m-lg-2" @click.prevent="eliminarInvitado">
    <i class="fa fa-trash text-white"></i>
  </button>
</template>

<script>
  export default {
    props: ['invitadoId'],
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
              .delete(`/admin/invitados/${this.invitadoId}`)
              .then((resp) => {
                const tr = document.querySelector(`#tr-${this.invitadoId}`)
                tr.parentNode.removeChild(tr)
                Swal.fire('Eliminado!', resp.data, 'success')
              })
              .catch((error) => {
                Swal.fire('Error!', 'No puedes eliminar a un invitado con eventos asignados', 'error')
              })
          }
        })
      },
    },
  }
</script>

<style>
</style>