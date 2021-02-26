<?php
ob_start();
require_once('database/conexion.php');
$con = connectDatabase();

function recorrer($query){
    $rows = [];
    while($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function ingresarMaestro($id_materia,$cedula,$nombre,$apellido,$edad,$direccion,$sexo,$ciudad){
    global $con;
    $query = $con->query("INSERT INTO `maestros` (`id_maestro`, `id_materia`, `cedula`, `Nombre`, `Apellido`, `edad`, `direccion`, `sexo`, `ciudad`) 
    VALUES (NULL, '$id_materia', '$cedula', '$nombre', '$apellido', '$edad', '$direccion', '$sexo', '$ciudad')");
}
function consulta($table){
    global $con;
    $query = $con->query("SELECT * FROM `$table`");
    return recorrer($query);
}

function targetas(){
    global $con;
    $query =$con->query("SELECT
    COUNT(*),
    curso.nivel,
    curso.jornada,
    especializacion.nom_especia
FROM
    `curso`
INNER JOIN especializacion ON especializacion.id_especia = curso.id_especia
GROUP BY
    curso.nivel,
    curso.jornada,
    curso.id_especia
HAVING
    COUNT(*) >= 1
    ORDER BY RAND()");
    return recorrer($query);
}

function consultaMaestros(){
    global $con;
    $query = $con->query("SELECT * FROM `maestros` INNER JOIN materia ON materia.id_materia = maestros.id_materia");
    return recorrer($query);
}

function insertarHora($hora,$jorna,$posicion){
    global $con;
    $query= $con->query("INSERT INTO `horarios` (`id_horario`, `hora`, `section`, `posicion`) VALUES (NULL, '$hora', '$jorna', '$posicion')");
}

function consultaMa($materia){
    global $con;
    $query=$con->query("SELECT * FROM `maestros` WHERE id_materia=$materia");
    return recorrer($query);
}

function consultaHoras($jornada){
    global $con;
    $query = $con->query("SELECT * FROM `horarios`  WHERE horarios.section = '$jornada' ORDER BY `posicion` ASC");
    return recorrer($query);
}

function insertarEspecialidad($name,$descripcion){
    global $con;
    $query = $con->query("INSERT INTO `especializacion` (`id_especia`, `nom_especia`, `descripcion_especia`) 
    VALUES (NULL, '$name', '$descripcion')");
}

function insertarCurso($paralelo,$id_esp,$nivel,$jornada){
    global $con;
    $query = $con->query("INSERT INTO `curso` (`id_curso`, `paralelo`, `id_especia`, `nivel`, `jornada`) 
    VALUES (NULL, '$paralelo', '$id_esp', '$nivel', '$jornada')");
}

function insertarMateria($noMate,$descrip){
    global $con;
    $query = $con->query("INSERT INTO `materia` (`id_materia`, `nombre_materia`, `descripcion`) 
    VALUES (NULL, '$noMate', '$descrip')");
}

function consultaCursos($jornada){
    global $con;
    $query = $con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia = curso.id_especia 
    WHERE curso.jornada='$jornada' ORDER BY `curso`.`paralelo` ASC");
    return recorrer($query);
}
function jornadas(){
    global $con;
    $query =$con ->query("SELECT jornada FROM `curso` GROUP BY jornada");
    return recorrer($query);
}

function especialidades(){
    global $con;
    $query = $con->query("SELECT * FROM `especializacion`");
    return recorrer($query);
}

function busqueda($jornada, $id_especi,$nivel){
    global $con;
    $query =$con->query("SELECT * FROM `curso` WHERE curso.id_especia =$id_especi AND curso.nivel ='$nivel' AND curso.jornada='$jornada'");
    return recorrer($query);
    
    /* $query =$con ->query("SELECT
    *
FROM
    `basico-cur`
INNER JOIN curso ON curso.id_curso = `basico-cur`.id_curso
INNER JOIN maestros ON maestros.id_maestro = `basico-cur`.`id_maestro`
INNER JOIN horarios ON horarios.id_horario = `basico-cur`.`id_horario`
INNER JOIN dias ON dias.id_dia = `basico-cur`.`id_dia`
WHERE
    curso.jornada <> '$jornada' AND curso.id_especia <> $id_especi");
     return recorrer($query); */
}

function insertarDias($dia){
    global $con;
    $query1=$con->query("SELECT * FROM `dias` WHERE dia_semana='$dia'");
    $aux=recorrer($query1);
    
    if($aux!=null){
        
        header("location: Dias.php?num=false");
        
    }else{
        $query =$con->query("INSERT INTO `dias` (`id_dia`, `dia_semana`) VALUES (NULL, '$dia')");
        header("location: Dias.php");
    }
    
}
//borrar
function borrarMaestros($id){
    global $con;
    $query = $con->query("DELETE FROM `maestros` WHERE `maestros`.`id_maestro` = $id");
}

function borrarHoras($id){
    global $con;
    $query = $con->query("DELETE FROM `horarios` WHERE `horarios`.`id_horario` = $id");
}

function borrarDias($id){
    global $con;
    $query=$con->query("DELETE FROM `dias` WHERE `dias`.`id_dia` = $id");
}

function borrrarEspecialidad($id){
    global $con;
    $query=$con->query("DELETE FROM `especializacion` WHERE `especializacion`.`id_especia` = $id");
}

function borrarMateria($id){
    global $con;
    $query=$con->query("DELETE FROM `materia` WHERE `materia`.`id_materia` = $id");
}

function borrarCurso($id){
    global $con;
    $query=$con->query("DELETE FROM `curso` WHERE `curso`.`id_curso` = $id");
}

//comprobacion
function comprobar($idMaes,$idHora,$idDia,$periodo){
    global $con;
    $query=$con->query("SELECT * FROM `basico-cur` WHERE `basico-cur`.`id_maestro` = $idMaes AND `basico-cur`.`id_horario`=$idHora AND `basico-cur`.`id_dia`=$idDia");
    return recorrer($query);
   
}

function insertarBasico($id_mae,$id_cur,$periodo,$id_hora,$id_dia){
    global $con;
    $query=$con->query("INSERT INTO `basico-cur` (`id_bascu`, `id_maestro`, `id_curso`, `periodo`, `id_horario`, `id_dia`) 
    VALUES (NULL, '$id_mae', '$id_cur', '$periodo', '$id_hora', '$id_dia')");
}

//consulta
function consultarMaestr($id){
    global $con;
    $query=$con->query("SELECT * FROM `maestros` INNER JOIN materia on materia.id_materia = maestros.id_materia  WHERE maestros.id_maestro=$id");
    return recorrer($query);
}
function consultaCruso($id){
    global $con;
    $query=$con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia = curso.id_especia WHERE curso.id_curso=$id");
    return recorrer($query);
}
function consultaHor($id){
    global $con;
    $query=$con->query("SELECT * FROM `horarios` WHERE horarios.id_horario = $id");
    return recorrer($query);
}

function consultaDia($id){
    global $con;
    $query=$con->query("SELECT * FROM `dias` WHERE dias.id_dia = $id");
    return recorrer($query);
}
?>
