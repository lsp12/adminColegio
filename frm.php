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
    $materia=$_POST['materi'];
    header("location: basicoCursos3.php?mate=$materia");
}

if(isset($_POST['maestros3'])){
    $aux=comprobar($_POST['maestrob'],$_POST['horab'],$_SESSION['dia'],$_POST['periodoAca']);
    if($aux==null){
        $_SESSION['id_maestro']=$_POST['maestrob'];
        $_SESSION['color']=$_POST['horab'];
        echo $_SESSION['color'];
        $_SESSION['periodo']=$_POST['periodoAca'];
        echo" <script> alert(' ".var_dump($aux)." Maestro ya esta ocuapdo ese dia a esa hora')</script>";
        header("location: confirmar.php");
     }else{
         echo "<script> alert('datos ingresados')</script>";
     }
}

if(isset($_GET['enviarfin'])){


    insertarBasico($_GET['id_maestro'],$_GET['id_curso'],$_GET['txt_periodo'],$_GET['id_hora'],$_GET['id_dia']);
    header("location: confirmar.php");
}
?>