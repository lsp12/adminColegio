<?php
require_once('modelo/general.php');

if(isset($_GET['maestros'])){

    borrarMaestros($_GET['maestros']);
    header("location: maestros.php");
}

if(isset($_GET['horas'])){
    borrarHoras($_GET['horas']);
    header("location: horaClase.php");
}

if(isset($_GET['dia'])){
    borrarDias($_GET['dia']);
    header("location: Dias.php");
}

if(isset($_GET['espe'])){
    borrrarEspecialidad($_GET['espe']);
    header("location: Especializaciones.php");
}

if(isset($_GET['mate'])){
    borrarMateria($_GET['mate']);
    header("location: afinidades.php");
}

if(isset($_GET['cursos'])){
    borrarCurso($_GET['cursos']);
    header("location: Cursos.php");
}
?>