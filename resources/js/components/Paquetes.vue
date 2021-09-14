<template>
  <section>
    <!-- Lista de paquetes -->
    <div id="paquetes" class="paquetes">
      <h3>Elige el Número de Boletos</h3>
      <ul class="lista-precios">
        <li class="tabla-precio">
          <h3>Pase por día (Viernes)</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label>Boletos Deseados</label>
            <input
              type="number"
              v-model="unDia"
              min="0"
              size="3"
              name="boletos[un_dia][cantidad]"
              placeholder="0"
              @change="calcular"
              class="form-control"
            />
            <input type="hidden" value="30" name="boletos[un_dia][precio]" />
          </div>
        </li>

        <li class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label>Boletos Deseados</label>
            <input
              type="number"
              min="0"
              size="3"
              name="boletos[completo][cantidad]"
              placeholder="0"
              v-model="completo"
              @change="calcular"
              class="form-control"
            />
            <input type="hidden" value="50" name="boletos[completo][precio]" />
          </div>
        </li>

        <li class="tabla-precio">
          <h3>Pase por 2 días (Viernes y Sábado)</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="orden">
            <label>Boletos Deseados</label>
            <input
              type="number"
              min="0"
              size="3"
              name="boletos[dos_dias][cantidad]"
              placeholder="0"
              v-model="dosDias"
              @change="calcular"
              class="form-control"
            />
            <input type="hidden" value="45" name="boletos[dos_dias][precio]" />
          </div>
        </li>
      </ul>
    </div>

    <!-- Lista de Eventos -->
    <div class="eventos">
      <h3>Elige tus talleres</h3>
      <div
        class="contenido-dia"
        v-for="(talleres, index) in eventos"
        :key="index"
        :class="{'hide' : !days[index]}"
      >
        <lista-eventos :dia="index" :eventos="talleres" :registro_old="registro_old"></lista-eventos>
      </div>
    </div>

    <!-- Resumen de la compra -->
    <div class="resumen">
      <h3>Pago y Extras</h3>
      <div class="caja flex-resp">
        <div class="extras">
          <div class="orden">
            <label for="camisa_evento">
              Camisa del Evento $10
              <small>(promocion 7% de descuento)</small>
            </label>
            <input
              type="number"
              min="0"
              name="pedido_extra[camisas][cantidad]"
              size="3"
              placeholder="0"
              v-model="camisas"
              @change="calcular"
              class="form-control"
            />
            <input type="hidden" name="pedido_extra[camisas][precio]" value="10" />
          </div>
          <div class="orden">
            <label for="etiquetas">
              Paquete de 10 etiquetas $2
              <small>(HTML5, CSS3, JavaScript, Angular)</small>
            </label>
            <input
              type="number"
              min="0"
              size="3"
              name="pedido_extra[etiquetas][cantidad]"
              placeholder="0"
              v-model="etiquetas"
              @change="calcular"
              class="form-control"
            />
            <input type="hidden" name="pedido_extra[etiquetas][precio]" value="2" />
          </div>
          <div class="orden">
            <label>Seleccione un regalo</label>
            <select name="regalo" required v-model="regalo" class="form-control">
              <option value selected disabled>--Seleccione un regalo--</option>
              <option
                v-for="regalo in regalos"
                :key="regalo.id"
                :value="regalo.id"
              >{{regalo.descripcion}}</option>
            </select>
          </div>
        </div>

        <!-- Total a pagar -->
        <div class="total">
          <p>Resumen:</p>
          <div ref="lista_productos" class="justify-left lista-productos"></div>
          <p>Total:</p>
          <div id="suma-total" class="justify-left"></div>
          <input type="hidden" name="total" v-model="total" />
          <input
            :disabled="disabled"
            :class="{'disabled': disabled}"
            type="submit"
            class="btn btn-primario"
            value="pagar"
            @click.prevent="submit"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import ListaEventos from './ListaEventos.vue'
  export default {
    components: { ListaEventos },
    props: ['eventos', 'regalos', 'boletos_old', 'registro_old', 'pedido_extra_old', 'regalo_old'],
    data() {
      return {
        unDia: 0,
        dosDias: 0,
        completo: 0,
        days: {},
        camisas: 0,
        etiquetas: 0,
        regalo: '',
        total: 0,
        disabled: true,
      }
    },
    watch: {
      unDia: function () {
        this.days['viernes'] = this.showDay('viernes')
      },
      dosDias: function () {
        this.days['viernes'] = this.showDay('viernes')
        this.days['sábado'] = this.showDay('sábado')
      },
      completo: function () {
        this.days['jueves'] = this.showDay('jueves')
        this.days['viernes'] = this.showDay('viernes')
        this.days['sábado'] = this.showDay('sábado')
        this.days['domingo'] = this.showDay('domingo')
      },
    },
    methods: {
      showDay(day) {
        const rules = {
          jueves: Number(this.completo) > 0,
          viernes: Number(this.unDia) > 0 || Number(this.dosDias) > 0 || Number(this.completo) > 0,
          sábado: Number(this.dosDias) > 0 || Number(this.completo) > 0,
          domingo: Number(this.completo) > 0,
        }
        return rules[day]
      },
      calcular() {
        const total =
          Number(this.unDia) * 30 +
          Number(this.dosDias) * 45 +
          Number(this.completo) * 50 +
          Number(this.camisas) * 10 * 0.93 +
          Number(this.etiquetas) * 2
        this.total = total
        if (total != 0) {
          this.disabled = false
          document.querySelector('#suma-total').innerHTML = `$${total.toFixed(2)}`
        } else {
          this.disabled = true
          document.querySelector('#suma-total').innerHTML = ''
        }

        // Mostrar la lista de productos
        const listaProductos = []
        if (Number(this.unDia) >= 1) listaProductos.push(this.unDia + ' Pases por un día')

        if (Number(this.dosDias) >= 1) listaProductos.push(this.dosDias + ' Pases por dos días')

        if (Number(this.completo) >= 1) listaProductos.push(this.completo + ' Pases completos')

        if (Number(this.camisas) >= 1) listaProductos.push(this.camisas + ' Camisas')

        if (Number(this.etiquetas) >= 1) listaProductos.push(this.etiquetas + ' Etiquetas')

        this.$refs.lista_productos.style.display = 'block'
        this.$refs.lista_productos.innerHTML = ''
        listaProductos.forEach((producto) => {
          this.$refs.lista_productos.innerHTML += `${producto} <br>`
        })
      },
      submit(e) {
        if (!this.regalo) return alert('Debes Seleccionar un regalo')
        document.querySelector('#form').submit()
      },
    },
    mounted() {
      if (this.boletos_old) {
        this.unDia = this.boletos_old['un_dia'].cantidad
        this.dosDias = this.boletos_old['dos_dias'].cantidad
        this.completo = this.boletos_old['completo'].cantidad
        this.disabled = false
        this.calcular();
      }
      if (this.pedido_extra_old) {
        this.camisas = this.pedido_extra_old['camisas']['cantidad']
        this.etiquetas = this.pedido_extra_old['etiquetas']['cantidad']
        this.calcular();
      }
      if (this.regalo_old) {
        this.regalo = this.regalo_old
      }
    },
  }
</script>

<style>
</style>