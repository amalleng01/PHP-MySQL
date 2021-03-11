<?php

// Incluir las clases MySQL y Consulta
include 'MySQL.php';
include 'consulta.php';

// Conectamos con la base de datos
$bd = new MySQL("admin", "admin", "192.168.1.67", "campions");



$post;


$jugadorArgs = array(
    'id'        => FILTER_SANITIZE_ENCODED,
    'nombre'    => FILTER_SANITIZE_ENCODED,
    'nivel'     => FILTER_SANITIZE_ENCODED,
    'fecha'     => FILTER_SANITIZE_ENCODED,
);

$campioArgs = array(
    'id'        => FILTER_SANITIZE_ENCODED,
    'nombre'    => FILTER_SANITIZE_ENCODED,
    'tipo'      => FILTER_SANITIZE_ENCODED,
    'precio'    => FILTER_SANITIZE_ENCODED,
    'fecha'     => FILTER_SANITIZE_ENCODED,
);

$batallaArgs = array(
    'idJ'        => FILTER_SANITIZE_ENCODED,
    'idC'        => FILTER_SANITIZE_ENCODED,
    'cantidad'   => FILTER_SANITIZE_ENCODED,
);

//declaración variables globales-----------
global $jugadorArgs;
global $batallaArgs;
global $campioArgs;
$_POST["form"] == "benito";

//INSERTS------------------------------------------------------------------------------------------------------------------------------
//INSERT JUGADOR
if($_POST["form"] == "jugador"){
$jugadorArgs=filter_input_array(INPUT_POST, $jugadorArgs);
    action_insert_jugador($jugadorArgs, $bd);
}

function action_insert_jugador($post, $bd){
    if($_POST["accion"] == "crear"){
        insertJugador($post, $bd);
    }
}

function insertJugador($post, $bd){
    $id=$post['id'];
    $nombre=$post['nombre'];
    $nivel=(int)$post['nivel'];
    $fecha=$post['fecha'];

    $query = "INSERT INTO jugador (id, nombre, nivel, fecha) VALUES ('$id', '$nombre', '$nivel', '$fecha')";
    new Consulta($query, $bd);
}

//INSERT CAMPEON
if($_POST["form"] == "campio"){
$campioArgs=filter_input_array(INPUT_POST, $campioArgs);
        action_insert_campeon($campioArgs, $bd);
    }

function action_insert_campeon($post, $bd){
    if($_POST["accion"] == "crear"){
        insertCampeon($post, $bd);
    }
}

function insertCampeon($post, $bd){
    $id=$post['id'];
    $nombre=$post['nombre'];
    $tipo=$post['tipo'];
    $precio=(int)$post['precio'];
    $fecha=$post['fecha'];

    $query = "INSERT INTO campeon (id, nombre, tipo, precio, fecha) VALUES ('$id', '$nombre', '$tipo', '$precio', '$fecha')";
    new Consulta($query, $bd);
}

//INSERT BATALLA
if($_POST["form"] == "batalla"){
    $batallaArgs=filter_input_array(INPUT_POST, $batallaArgs);
        action_insert_batalla($batallaArgs, $bd);
}

function action_insert_batalla($post, $bd){
    if($_POST["accion"] == "crear"){
        insertBatalla($post, $bd);
    }
}

function insertBatalla($post, $bd){
    $idJugador=$post['idJ'];
    $idCampeon=$post['idC'];
    $cantidad=(int)$post['cantidad'];

    $query = "INSERT INTO batalla (idJugador, idCampeon, cantidad) VALUES ('$idJugador', '$idCampeon', '$cantidad')";
    new Consulta($query, $bd);
}


//DELETE--------------------------------------------------------------------------------------------------------------------
//DELETE JUGADOR
if($_POST["form"] == "jugador"){
    $jugadorArgs=filter_input_array(INPUT_POST, $jugadorArgs);
        action_delete_jugador($jugadorArgs, $bd);
}

function action_delete_jugador($post, $bd){
    if($_POST["accion"] == "eliminar"){
        deleteJugador($post, $bd);
    }
}

function deleteJugador($post, $bd){
    $id=$post['id'];

    $query = "DELETE FROM jugador WHERE id=$id";
    new Consulta($query, $bd);
}

//DELETE BATALLA
if($_POST["form"] == "batalla"){
    $batallaArgs=filter_input_array(INPUT_POST, $batallaArgs);
        action_delete_batalla($batallaArgs, $bd);
}


function action_delete_batalla($post, $bd){
    if($_POST["accion"] == "eliminar"){
        deleteBatalla($post, $bd);
    }
}

function deleteBatalla($post, $bd){
    $idJugador=$post['idJ'];
    $idCampeon=$post['idC'];

    $query = "DELETE FROM batalla WHERE idJugador='$idJugador' AND idCampeon='$idCampeon'";
    new Consulta($query, $bd);
}

//DELETE CAMPEON
if($_POST["form"] == "campio"){
    $campioArgs=filter_input_array(INPUT_POST, $campioArgs);
        action_delete_campeon($campioArgs, $bd);
}

function action_delete_campeon($post, $bd){
    if($_POST["accion"] == "eliminar"){
        deleteCampeon($post, $bd);
    }
}

function deleteCampeon($post, $bd){
    $id=$post['id'];

    $query = "DELETE FROM campeon WHERE id=$id";
    new Consulta($query, $bd);
}


//UPATE-------------------------------------------------------------------------------------------------------------------
//UPDATE JUGADOR
if($_POST["form"] == "jugador"){
    $jugadorArgs=filter_input_array(INPUT_POST, $jugadorArgs);
        action_update_jugador($jugadorArgs, $bd);
}

function action_update_jugador($post, $bd){
    if($_POST["accion"] == "modificar"){
        updateJugador($post, $bd);
    }
}
function updateJugador($post, $bd){
    $id=$post['id'];
    $nombre=$post['nombre'];
    $nivel=(int)$post['nivel'];
    $fecha=$post['fecha'];

    $query = "UPDATE jugador SET nombre='$nombre', nivel='$nivel', fecha='$fecha' WHERE id=$id";
    new Consulta($query, $bd);
}

//UPDATE CAMPEON
if($_POST["form"] == "campio"){
    $campioArgs=filter_input_array(INPUT_POST, $campioArgs);
        action_update_campeon($campioArgs, $bd);
}

function action_update_campeon($post, $bd){
    if($_POST["accion"] == "modificar"){
        updateCampeon($post, $bd);
    }
}

function updateCampeon($post, $bd){
    $id=$post['id'];
    $nombre=$post['nombre'];
    $tipo=$post['tipo'];
    $precio=(int)$post['precio'];
    $fecha=$post['fecha'];

    $query = "UPDATE campeon SET nombre='$nombre', tipo='$tipo', precio='$precio', fecha='$fecha' WHERE id=$id";
    new Consulta($query, $bd);
}

//UPDATE BATALLA
if($_POST["form"] == "batalla"){
    $batallaArgs=filter_input_array(INPUT_POST, $batallaArgs);
        action_update_batalla($batallaArgs, $bd);
}


function action_update_batalla($post, $bd){
    if($_POST["accion"] == "modificar"){
        updateBatalla($post, $bd);
    }
}

function updateBatalla($post, $bd){
    $idJugador=$post['idJ'];
    $idCampeon=$post['idC'];
    $cantidad=(int)$post['cantidad'];
    
    $query = "UPDATE batalla SET cantidad='$cantidad' WHERE idJugador='$idJugador' AND idCampeon='$idCampeon'";
    new Consulta($query, $bd);
}




//GET DE LAS TABLAS---------------------------
//GET JUGADORES
function getJugadores($bd){
    $query = ("SELECT * FROM jugador");
    $query = new Consulta($query, $bd);
    return $query;
    
}

//GET CAMPEONES
function getCampeones($bd){
    $query = ("SELECT * FROM campeon");
    $query = new Consulta($query, $bd);
    return $query;
}

//GET BATALLAS
function getBatallas($bd){
    $query = ("SELECT * FROM batalla");
    $query = new Consulta($query, $bd);
    return $query;
}
//-------------------------------------------






?>