<html>
<head>
    <title>ENVIO DE CORREOS</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <header>
        <h1>ENVIO DE CORREOS</h1>
        <nav>
            <?php if (isset($_SESSION['user'])) : ?>
                <li><a href="<?= BASE_URL ?>logout">Cerrar sesión</a></li>
            <?php else : ?>
                <li><a href="<?= BASE_URL ?>login">Iniciar sesión</a></li>
                <li><a href="<?= BASE_URL ?>register">Registrarse</a></li>
            <?php endif; ?>
            <a href="<?= BASE_URL ?>mensajes">Mensajes</a>
            <?php if (isset($_SESSION['admin'])) : ?>
                <a href="<?= BASE_URL ?>admin">Admin</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>