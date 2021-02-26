<?php
session_start();
require_once('modelo/general.php');
if(isset($_POST['maestros'])){
    
ingresarMaestro($_POST['mate'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['direccion'],$_POST['sexo'],$_POST['ciudad']);
header("location: maestros.php");
}

if(isset($_POST['horasAca'])){
    insertarHora($_POST['hora'],$_POST['jornada'],$_POST['posicion']);
    header("location: horaClase.php");
}

if(isset($_POST['especial'])){
    insertarEspecialidad($_POST['nombreE'],$_POST['descripcion']);
    header("location: Especializaciones.php");
}

if(isset($_POST['CursosA'])){
    insertarCurso($_POST['paralelo'],$_POST['tipoC'],$_POST['Nivel'],$_POST['JornadaCuerso']);
    header("location: Cursos.php");
}

if (isset($_POST['guardarMateria'])) {
    insertarMateria($_POST['Materia'],$_POST['descripcionM']);
    header("location: afinidades.php");
}
if(isset($_POST['diasClase'])){
    
    insertarDias($_POST['dias']);   
}

if(isset($_POST['maestros'])){
    $_SESSION['jornada']=$_POST['jornada'];
    $busc=busqueda($_POST['jornada'],$_POST['Especialidad'],$_POST['Nivel']);
    $dias=consulta("dias");
    header("location: basicoCursos2.php?busq=".serialize($busc)."&dias=".serialize($dias));
}

if(isset($_POST['maestros2'])){
    $_SESSION['cursos']=$_POST['cursosb'];
    $_SESSION['dia']=$_POST['diaCurso'];
    header("location: basicoCursos3.php");
}
?>