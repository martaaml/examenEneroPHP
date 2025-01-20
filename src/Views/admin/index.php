<?php
// how many records should be displayed on a page?
$records_per_page = 5;
// instantiate the pagination object
$pagination = new Zebra_Pagination();
// the number of total records is the number of records in the array
$pagination->records(count($mensajes)); //aqui
// records per page
$pagination->records_per_page($records_per_page);
// here's the magic: we need to display only the records for the current page
//aqui
$mensajes = array_slice(
    //aqui
    $mensajes,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);
?>
<div id="menu_admin">
    <div v-for="gestion in menu">
        <button @click="viewMenu(gestion.id)">{{ gestion.title }}</button>
    </div>
    <div v-if="verCat" class="d-flex gap-2">
        <div class="w-75">
            <h2>Mis mensajes</h2>
            </h2>
            <table id="categorias" class="table table-striped table-hover">
                <tr>
                    <th>DE</th>
                    <th>ASUNTO</th>
                    <th>FECHA</th>
                </tr>
                <tr v-for="mensaje in mensajes">
                    <td>{{ mensajes.de }}</td>
                    <td>{{ mensajes.asunto }}</td>
                    <td>{{ mensajes.fecha }}</td>
                    <td>{{ categoria.borrado?'Si':'No' }}</td>
                    <td class="d-flex gap-2">
                        <form action="<?= BASE_URL ?>mensaje/delete" method="post" v-if="mensaje.borrado == false">
                            <input type="hidden" name="id" id="id" v-model="mensaje.id">
                            <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete-outline"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= BASE_URL ?>mensaje/reactive" method="post" v-if="mensaje.borrado == true">
                            <input type="hidden" name="id" id="id" v-model="mensaje.id">
                            <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete-outline"></i></button>
                        </form>
                    </td>
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
                editarCategoria(cat) {
                    this.formularioCategoria = cat;
                },
                editarMensaje(mensaje) {
                    this.formularioMensaje = mensaje;
                },
                guardarMensaje() {
                    console.log(this.formularioMensaje);
                }
            }
        }).mount('#menu_admin')
    </script>