<?php
session_start();
require_once('modelo/general.php');

if(isset($_GET['maestros'])){

    borrarMaestros($_GET['maestros']);
    header("location: maestros.php?selec=Maestros");
}

if(isset($_GET['horas'])){
    borrarHoras($_GET['horas']);
    header("location: formulariosBasicos.php?selec=Horas");
}

if(isset($_GET['dia'])){
    borrarDias($_GET['dia']);
    header("location: Dias.php");
}

if(isset($_GET['espe'])){
    borrrarEspecialidad($_GET['espe']);
    header("location: formulariosBasicos.php?selec=especializaciones");
}

if(isset($_GET['mate'])){
    borrarMateria($_GET['mate']);
    header("location: formulariosBasicos.php?selec=materias");
}

if(isset($_GET['cursos'])){
    borrarCurso($_GET['cursos']);
    header("location: Cursos.php");
}

if(isset($_GET['AdminLog'])){
    borrarLogAdm($_GET['AdminLog']);
    header("location: maestros.php?selec=Administrador");
}

if(isset($_GET['cerrar'])){
    $_SESSION['maestro']=null;
    $_SESSION['admin']=null;
    header("location: login.php");
}
?>