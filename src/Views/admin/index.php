<div id="menu_admin">
    <div v-if="verCat" class="d-flex gap-2">
        <div class="w-75">
            <h2>Mis mensajes</h2>
            </h2>
            <table id="mensajes" class="table table-striped table-hover">
                <tr>
                    <th>DE</th>
                    <th>ASUNTO</th>
                    <th>FECHA</th>
                </tr>
                <tr v-for="mensaje in mensajes">
                    <td>{{ mensaje.de }}</td>
                    <td>{{ mensaje.asunto }}</td>
                    <td>{{ mensaje.fecha }}</td>
                </tr>
            </table>
        </div>

        <form action="<?= BASE_URL ?>mensaje" method="post">
            <h2>{{formularioMensaje.id ? 'Editar' : 'Crear nueva'}} mensaje</h2>
            <input type="number" name="id" id="id" v-model="formularioMensaje.id" readonly hidden>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required v-model="formularioMensaje.nombre">
            <button type="submit">{{ formularioMensaje.id ? 'Editar' : 'Crear' }}</button>
            <button type="button" v-if="formularioMensaje.id" @click="formularioMensaje={}">Cancelar</button>
        </form>
    </div>

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    sesion: <?php echo json_encode($_SESSION); ?>,
                    mensajes: <?php echo json_encode($mensajes); ?>,

                    formularioMensaje: {
                        id: null,
                        de: '',
                        asunto: '',
                        fecha: '',
                    }
                }
            },
            methods: {
                editarMensaje(mensaje) {
                    this.formularioMensaje = mensaje;
                },
                guardarMensaje() {
                    console.log(this.formularioMensaje);
                }
            }
        }).mount('#menu_admin')
    </script>