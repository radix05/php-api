<?php
include 'database.php';

function get_all_user_list()
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM cliente";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $all_user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $all_user_info;
}

function get_single_user_info($id)
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM cliente where id_cliente = {$id} ";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $user_info;
}




function update_user_info($id,$nombre,$apellido,$nit,$contraseña,$correo)
{
    $pdo = Database::connect();
    $sql = "UPDATE cliente SET nombre = '{$nombre}', apellido = '{$apellido}',nit = '{$nit}',contraseña = '{$contraseña}',correo = '{$correo}' where id_cliente = '{$id}'";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "La Base de Datos ah sido actualiza";
        }
        else{
            $status['message'] = "error!! La Base de Datos no ah sido actualizado";
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
    }

    Database::disconnect();
    return $status;
}


function add_user_info($nombre,$apellido,$nit,$contraseña,$correo)
{
    $pdo = Database::connect();
    $sql = "INSERT INTO cliente(`nombre`,`apellido`,`nit`,`contraseña`,`correo`) VALUES ('{$nombre}', '{$apellido}','{$nit}','{$contraseña}','{$correo}')";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "La Base de Datos ah sido actualiza";
        }
        else{
            $status['message'] = "error!! La Base de Datos no ah sido actualizado";
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
    }

    Database::disconnect();
    return $status;
}

function delete_user_info($id)
{
    $pdo = Database::connect();
    $sql ="DELETE FROM cliente where id_cliente = '{$id}'";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "La Base de Datos ah sido actualiza";
        }
        else{
            $status['message'] = "error!! La Base de Datos no ah sido actualizado";
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
    }

    Database::disconnect();
    return $status;
}