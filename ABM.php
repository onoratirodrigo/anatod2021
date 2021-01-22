<?php

include 'class.database.php';
include 'clientes.php';
include 'localidades.php';
$clienteABM = new Cliente();


    if(isset($_POST['elimID'])){
        $id = $_POST['elimID'];
        $clienteABM->deleteCliente($id);
    }

    if (isset($_POST['enviar-alta'])){
        $name = $_POST['alta-nombre'];
        $dni = $_POST['alta-dni'];
        $localidad = $_POST['l_localidades'];

        $clienteABM->altaCliente($name, $dni, $localidad);
        header('location:index.php');
    }

    if (isset($_POST['enviar-modificar'])){
        $name = $_POST['mod-nombre'];
        $dni = $_POST['mod-dni'];
        $localidad = $_POST['mod_localidades'];
        $id = $_POST['mod-id'];

        $clienteABM->modificarCliente($name, $dni, $localidad, $id);
        header('location:index.php');
    }

?>