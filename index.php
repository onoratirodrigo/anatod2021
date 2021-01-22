<?php

    //incluir archivos para conexion BD
    require_once 'class.database.php';
    include 'provincias.php';
    include 'localidades.php';
    include 'clientes.php';

    //crecion de objetos para conexion
    $clientes = new Cliente();
    $loc = new Localidad();
    $tprovincia = new Provincia();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="container">

        <h1 class="header">Test Anatod</h1>

        <div class="opciones">
            <button id="b_alta" class="botoncito">
                Nuevo cliente
            </button>

            <button id="b_modificar" class="botoncito">
                Modificar cliente
            </button>
        </div>

        <div id="form_alta" class="form_alta" hidden>
            <h3>Agregar cliente</h3>
            <form action="ABM.php" method="POST" id="alta-cliente" name="alta-cliente">
                <label for="alta-nombre">Nombre: </label>
                <input type="text" placeholder="Ingrese nombre completo de cliente" id="alta-nombre" name="alta-nombre" required>
                <label for="alta-dni">DNI: </label>
                <input type="number" placeholder="Ingrese dni de cliente" id="alta-dni" name="alta-dni" required>
                <label for="l_localidades">Localidades: </label>
                <select name='l_localidades' id='l_localidades' class="l_localidades">

                <?php
                    $loc->getAllLocalidades();

                ?>
               
                <button id="enviar-alta" name="enviar-alta" class="botoncito mod">Enviar</button>

            </form>
        </div>

        <div id="form-modificar" class="form-modificar" hidden>
            <h3>Modificar cliente</h3>
            <h4 id="sub_modif">Selecciona el cliente que quieras modificar</h4>
            <form action="ABM.php" method="POST" id="mod-cliente" name="mod-cliente">
                <input type="text" id="mod-id" name="mod-id" hidden>
                <label for="mod-nombre" >Nombre: </label>
                <input type="text" placeholder="Modificar nombre" id="mod-nombre" name="mod-nombre" disabled required>
                <label for="mod-dni">DNI: </label>
                <input type="number" placeholder="Modificar dni" id="mod-dni" name="mod-dni" disabled required>
                <label for="mod_localidades">Localidades: </label>
                <select name='mod_localidades' id='mod_localidades' class="l_localidades" disabled required>
                <?php

                    $loc->getAllLocalidades();

                ?>
                
                <button id="enviar-modificar" name="enviar-modificar" class="botoncito mod">Modificar</button>

            </form>
        </div>

        <div class="tablas">
            <h3>Tabla Clientes</h3>
            <table class="table-clientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                    </tr>
                </thead>

                <tbody id="clientes">
                    <?php

                        $clientes->listAllClientes();

                    ?>
                </tbody>            

            </table>
        </div>

        <hr>

        <div class="tablas">
            <h3>Tabla Provincias</h3>
            <table class="table-provincias">
                <thead>
                    <tr>
                        <th>ID provincia</th>
                        <th>Nombre provincia</th>
                        <th>Nombre localidad</th>
                        <th>Clientes en la localidad</th>
                    </tr>
                </thead>

                <tbody id="provincias">
                    <?php

                        $tprovincia->tablaProvincias();

                    ?>
                </tbody>            

            </table>
        </div>

        <div>
            <footer>
                <p>developed by Onorati Rodrigo</p>
            </footer>
        </div>
        
    </div>
    <script src="script.js"></script>
</body>
</html>