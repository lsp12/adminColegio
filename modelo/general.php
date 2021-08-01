<?php
ob_start();
require_once('database/conexion.php');
$con = connectDatabase();

function recorrer($query)
{
    $rows = [];
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function ingresarMaestro($id_materia, $cedula, $nombre, $apellido, $edad, $direccion, $sexo, $ciudad, $correo, $contraseña)
{
    global $con;

    $querys = $con->query("SELECT * FROM `maestros` WHERE `cedula`= '$cedula' OR correoma='$correo'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        $query = $con->query("INSERT INTO `maestros` (`id_maestro`, `id_materia`, `cedula`, `Nombre`, `Apellido`, `edad`, `direccion`, `sexo`, `ciudad`, `correoma`, `contraseñama`) 
    VALUES (NULL, '$id_materia', '$cedula', '$nombre', '$apellido', '$edad', '$direccion', '$sexo', '$ciudad', '$correo', '$contraseña');");
        header("location: maestros.php?selec=Maestros");
    } else {
        header("location: maestros.php?error=true&selec=Maestros");
    }
}

function ingresarAdmin($correo, $contraseña)
{
    global $con;

    $querys = $con->query("SELECT * FROM `login` WHERE correoadm ='$correo'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        $query = $con->query("INSERT INTO `login` (`id_loginadm`, `correoadm`, `contraseñaadm`) VALUES (NULL, '$correo', '$contraseña');");
        header("location: maestros.php?selec=Administrador");
    } else {
        header("location: maestros.php?error=true&selec=Administrador");
    }
}

function consulta($table)
{
    global $con;
    $query = $con->query("SELECT * FROM `$table`");
    return recorrer($query);
}

function targetas()
{
    global $con;
    $query = $con->query("SELECT
    COUNT(*),
    curso.id_curso,
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

function consultaMaestros()
{
    global $con;
    $query = $con->query("SELECT * FROM `maestros` INNER JOIN materia ON materia.id_materia = maestros.id_materia");
    return recorrer($query);
}
function borrarLogAdm($id)
{
    global $con;
    $query = $con->query("DELETE FROM `login` WHERE `login`.`id_loginadm` = $id");
}

function consultaLogin()
{
    global $con;
    $query = $con->query("SELECT * FROM `login`");
    return recorrer($query);
}

function insertarHora($hora, $jorna, $hora2)
{

    global $con;
    $hora = $hora . "-" . $hora2;
    $querys = $con->query("SELECT * FROM `horarios` WHERE `hora`= '$hora'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $query = $con->query("INSERT INTO `horarios` (`id_horario`, `hora`, `section`, `posicion`) VALUES (NULL, '$hora', '$jorna', '0')");
        header("location: formulariosBasicos.php?selec=Horas");
    } else {

        header("location: formulariosBasicos.php?selec=Horas&error=true");
    }
}

function consultaMa($materia)
{
    global $con;
    $query = $con->query("SELECT * FROM `maestros` WHERE id_materia=$materia");
    return recorrer($query);
}

function confirmarCorreo($correo, $rol)
{
    global $con;

    if ($rol == "Maestro") {
        $query1 = $con->query("SELECT * FROM `maestros` WHERE correoma='$correo'");
        return recorrer($query1);
    } else if ($rol == "Administrador") {
        $query = $con->query("SELECT * FROM `login` WHERE correoadm ='$correo'");
        return recorrer($query);
    } else {
        header("location: login.php");
    }
}

function consultaHoras($jornada)
{
    global $con;
    $query = $con->query("SELECT * FROM `horarios`  WHERE horarios.section = '$jornada' ORDER BY `horarios`.`hora` ASC");
    return recorrer($query);
}

function insertarEspecialidad($name, $descripcion)
{
    global $con;

    $querys = $con->query("SELECT * FROM `especializacion` WHERE `nom_especia`= '$name'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $query = $con->query("INSERT INTO `especializacion` (`id_especia`, `nom_especia`, `descripcion_especia`) 
        VALUES (NULL, '$name', '$descripcion')");
        header("location: formulariosBasicos.php?selec=especializaciones");
    } else {

        header("location: formulariosBasicos.php?selec=especializaciones&error=true");
    }
}

function insertarCurso($paralelo, $id_esp, $nivel, $jornada)
{
    global $con;
    $query = $con->query("INSERT INTO `curso` (`id_curso`, `paralelo`, `id_especia`, `nivel`, `jornada`) 
    VALUES (NULL, '$paralelo', '$id_esp', '$nivel', '$jornada')");
}

function insertarMateria($noMate, $descrip)
{
    global $con;

    $querys = $con->query("SELECT * FROM `materia` WHERE `nombre_materia`= '$noMate'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $query = $con->query("INSERT INTO `materia` (`id_materia`, `nombre_materia`, `descripcion`) 
    VALUES (NULL, '$noMate', '$descrip')");
        header("location: formulariosBasicos.php?selec=materias");
    } else {

        header("location: formulariosBasicos.php?selec=materias&error=true");
    }
}

function consultaCursos($jornada)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia = curso.id_especia 
    WHERE curso.jornada='$jornada' ORDER BY `curso`.`paralelo` ASC");
    return recorrer($query);
}
function jornadas()
{
    global $con;
    $query = $con->query("SELECT jornada FROM `curso` GROUP BY jornada");
    return recorrer($query);
}

function especialidades()
{
    global $con;
    $query = $con->query("SELECT * FROM `especializacion`");
    return recorrer($query);
}

function busqueda($jornada, $id_especi, $nivel)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` WHERE curso.id_especia =$id_especi AND curso.nivel ='$nivel' AND curso.jornada='$jornada'");
    return recorrer($query);
}

function insertarDias($dia)
{
    global $con;
    $query1 = $con->query("SELECT * FROM `dias` WHERE dia_semana='$dia'");
    $aux = recorrer($query1);

    if ($aux != null) {

        header("location: Dias.php?num=false");
    } else {
        $query = $con->query("INSERT INTO `dias` (`id_dia`, `dia_semana`) VALUES (NULL, '$dia')");
        header("location: Dias.php");
    }
}
//borrar
function borrarMaestros($id)
{
    global $con;
    $query = $con->query("DELETE FROM `maestros` WHERE `maestros`.`id_maestro` = $id");
}

function borrarHoras($id)
{
    global $con;
    $query = $con->query("DELETE FROM `horarios` WHERE `horarios`.`id_horario` = $id");
}

function borrarDias($id)
{
    global $con;
    $query = $con->query("DELETE FROM `dias` WHERE `dias`.`id_dia` = $id");
}

function borrrarEspecialidad($id)
{
    global $con;
    $query = $con->query("DELETE FROM `especializacion` WHERE `especializacion`.`id_especia` = $id");
}

function borrarMateria($id)
{
    global $con;
    $query = $con->query("DELETE FROM `materia` WHERE `materia`.`id_materia` = $id");
}

function borrarCurso($id)
{
    global $con;
    $query = $con->query("DELETE FROM `curso` WHERE `curso`.`id_curso` = $id");
}

//comprobacion
function comprobar($idMaes, $idHora, $idDia, $idCuros)
{
    global $con;
    $query = $con->query("SELECT * FROM basico_cur INNER JOIN maestros ON maestros.id_maestro = basico_cur.id_maestro INNER JOIN materia ON materia.id_materia = maestros.id_materia INNER JOIN curso ON curso.id_curso = basico_cur.id_curso INNER JOIN horarios ON horarios.id_horario = basico_cur.id_horario INNER JOIN especializacion ON especializacion.id_especia =curso.id_especia WHERE ( basico_cur.`id_horario`=$idHora AND basico_cur.`id_dia`=$idDia AND basico_cur.id_curso=$idCuros)");
    $arr = recorrer($query);
    if ($arr == null) {
        $query = $con->query("SELECT * FROM basico_cur INNER JOIN curso ON curso.id_curso = basico_cur.id_curso INNER JOIN horarios ON horarios.id_horario = basico_cur.id_horario INNER JOIN especializacion ON especializacion.id_especia =curso.id_especia WHERE ( basico_cur.`id_horario`=$idHora AND basico_cur.`id_dia`=$idDia AND basico_cur.id_maestro=$idMaes)");
        $arr = recorrer($query);
        if ($arr == null) {
            return $arr;
        } else {
            echo " /* <script> alert('el Maestro ya esta ocupado ese dia a esa hora') */
            function MyFuntion() {
                window.history.back();
            }
            </script>";
            echo "El maestro ya esta ocupado en la hora " . $arr[0]["hora"] . " con el curso " . $arr[0]["paralelo"] . " Especalidad " . $arr[0]["nom_especia"] . " De " . $arr[0]["nivel"] . " nivel " . $arr[0]["jornada"] . ' <button type="submit" class="btn btn-primary" onclick="MyFuntion()" name="maestros3">Regresar</button>';
            //echo var_dump($arr);
            return $arr;
        }
    } else {
        echo " /* <script> alert('el horario ya esta ocupado ese dia a esa hora') */
        function MyFuntion() {
            window.history.back();
        }
        </script>";
        echo "El maestro " . $arr[0]["Nombre"] . " da la materia de " . $arr[0]["nombre_materia"] . " ocupa Da clases a la hora " . $arr[0]["hora"] . " con el curso " . $arr[0]["paralelo"] . " Especalidad " . $arr[0]["nom_especia"] . " De " . $arr[0]["nivel"] . " nivel " . $arr[0]["jornada"] . ' <button type="submit" class="btn btn-primary" onclick="MyFuntion()" name="maestros3">Regresar</button>';

        return 5;
    }
}

function mostrar()
{
}

function insertarBasico($id_mae, $id_cur, $periodo, $id_hora, $id_dia)
{
    global $con;
    $query = $con->query("INSERT INTO basico_cur (`id_bascu`, `id_maestro`, `id_curso`, `periodo`, `id_horario`, `id_dia`) 
    VALUES (NULL, '$id_mae', '$id_cur', '$periodo', '$id_hora', '$id_dia')");
}

//consulta
function consultarMaestr($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `maestros` INNER JOIN materia on materia.id_materia = maestros.id_materia  WHERE maestros.id_maestro=$id");
    return recorrer($query);
}
function consultaCruso($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia = curso.id_especia WHERE curso.id_curso=$id");
    return recorrer($query);
}
function consultaHor($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `horarios` WHERE horarios.id_horario = $id");
    return recorrer($query);
}

function consultaDia($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `dias` WHERE dias.id_dia = $id");
    return recorrer($query);
}
function horariosCol($id, $dia)
{
    global $con;
    $query = $con->query("SELECT id_bascu, maestros.Nombre, materia.nombre_materia,curso.paralelo,dia_semana, horarios.hora FROM basico_cur 
    INNER JOIN curso ON curso.id_curso = basico_cur.`id_curso` 
    INNER JOIN dias ON dias.id_dia = basico_cur.`id_dia` 
    INNER JOIN maestros ON maestros.id_maestro = basico_cur.`id_maestro` 
    INNER JOIN materia ON materia.id_materia = maestros.id_materia 
    INNER JOIN horarios ON horarios.id_horario =basico_cur.`id_horario` 
    WHERE dias.dia_semana = '$dia' AND curso.id_curso = $id ORDER BY `horarios`.`hora` asc");
    return recorrer($query);
}

function Dias()
{
    global $con;
    $query = $con->query("SELECT * FROM `dias` ORDER BY `id_dia` ASC");
    return recorrer($query);
}

function buscarCurs($txtjorna, $id)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` WHERE jornada='$txtjorna' AND id_especia=$id");
    return recorrer($query);
}

function Ver_cursos()
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia=curso.id_especia ORDER BY `curso`.`paralelo` ASC");
    return recorrer($query);
}

function Ver_cursoMa($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `basico_cur` INNER JOIN maestros ON maestros.id_maestro= basico_cur.id_maestro INNER JOIN curso ON curso.id_curso =basico_cur.id_curso INNER JOIN especializacion ON especializacion.id_especia=curso.id_especia WHERE basico_cur.id_maestro =$id");
    return recorrer($query);
}

function EliminarHorar($id)
{
    global $con;
    $query = $con->query("DELETE FROM basico_cur WHERE basico_cur.`id_bascu` = $id");
}

function ConsultarCurso($paralelo, $id_esp, $nivel, $jornada)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` WHERE curso.paralelo='$paralelo' AND curso.id_especia='$id_esp' AND curso.nivel='$nivel' AND curso.jornada='$jornada'");
    $arr = recorrer($query);
    if ($arr == null) {
        insertarCurso($paralelo, $id_esp, $nivel, $jornada);
        InsertarCuRecien($paralelo, $id_esp, $nivel, $jornada);
        header("location: Cursos.php"); 
    } else {
        echo " <script> alert('el curso ya esta registrado')</script>";
        header("location: Cursos.php");
    }
}

function InsertarCuRecien($paralelo, $id_esp, $nivel, $jornada)
{
    global $con;
    $query = $con->query("SELECT id_materiaCU FROM cursos_materias AS cm INNER JOIN curso c ON c.id_curso= cm.id_cursoMA 
    INNER JOIN especializacion e ON e.id_especia = c.id_especia INNER JOIN materia m 
    ON m.id_materia=cm.id_materiaCU WHERE c.nivel= '$nivel' AND e.id_especia=$id_esp GROUP BY cm.id_materiaCU");

    $arr2 = recorrer($query);
    if ($arr2 != null) {
        $query = $con->query("SELECT * FROM `curso` WHERE curso.paralelo='$paralelo' AND curso.id_especia='$id_esp' AND curso.nivel='$nivel' AND curso.jornada='$jornada'");
        $arr = recorrer($query);
        var_dump($arr2);
        var_dump($arr);
        foreach ($arr2 as $lista) {
            $curso=$arr[0]['id_curso'];
            $id_mate=$lista['id_materiaCU'];
            $query=$con->query("INSERT INTO `cursos_materias` (`id_CM`, `id_materiaCU`, `id_cursoMA`) VALUES (NULL, '$id_mate', '$curso')");
        }
    }else{
        echo " <script> alert('hubo error')</script>";
        var_dump($arr2);
    }
}

function SelectCurso($id)
{
    global $con;
    $query = $con->query("SELECT * FROM `curso` INNER JOIN especializacion ON especializacion.id_especia=curso.id_especia WHERE id_curso=$id");
    return recorrer($query);
}

function BuscarCursoMa($id, $dia)
{
    global $con;
    $query = $con->query("SELECT * FROM `basico_cur` INNER JOIN curso ON curso.id_curso = basico_cur.`id_curso` 
    INNER JOIN dias ON dias.id_dia = basico_cur.`id_dia` 
    INNER JOIN maestros ON maestros.id_maestro = basico_cur.`id_maestro` 
    INNER JOIN materia ON materia.id_materia = maestros.id_materia 
    INNER JOIN horarios ON horarios.id_horario =basico_cur.`id_horario`
    INNER JOIN especializacion ON especializacion.id_especia =curso.id_especia  
    WHERE basico_cur.id_maestro=$id and dias.dia_semana ='$dia'");
    return recorrer($query);
}

function NivelesCurso()
{
    global $con;
    $query = $con->query("SELECT curso.nivel, especializacion.nom_especia FROM `curso` INNER JOIN especializacion 
    ON curso.id_especia = especializacion.id_especia GROUP BY curso.nivel, especializacion.nom_especia");
    return recorrer($query);
}

function ComprobarMateCur($noMate, $nom_especia, $nivel)
{
    global $con;

    $querys = $con->query("SELECT * FROM cursos_materias AS cm INNER JOIN curso c ON c.id_curso= cm.id_cursoMA INNER JOIN especializacion e 
    ON e.id_especia = c.id_especia INNER JOIN materia m 
    ON m.id_materia=cm.id_materiaCU WHERE m.id_materia='$noMate' AND c.nivel= '$nivel' AND e.nom_especia='$nom_especia'");

    $arr = recorrer($querys);
    if ($arr == null) {
        $query = $con->query("SELECT curso.id_curso, curso.id_especia FROM `curso` INNER JOIN especializacion 
        ON especializacion.id_especia = curso.id_especia WHERE nivel='$nivel' AND especializacion.nom_especia ='$nom_especia' ");

        $query = recorrer($query);
        var_dump($query);
        foreach ($query as $lista) {
            UnirMate($noMate, $lista["id_curso"]);
            echo "<script> alert (" . $lista["id_curso"] . ")</script>";
        }
        header("location: CursosMaterias.php?selec=materias");
    } else {
        header("location: CursosMaterias.php?selec=materias&error=true");
    }
}

function UnirMate($idMat, $idCurso)
{
    global $con;
    $query = $con->query("INSERT INTO `cursos_materias` (`id_CM`, `id_materiaCU`, `id_cursoMA`) VALUES (NULL, '$idMat', '$idCurso')");
}

function MostrarCUMA()
{
    global $con;
    $query = $con->query("SELECT c.nivel, e.nom_especia, m.nombre_materia FROM `cursos_materias` 
    INNER JOIN curso c ON c.id_curso = cursos_materias.id_cursoMA 
    INNER JOIN materia m ON m.id_materia = cursos_materias.id_materiaCU 
    INNER JOIN especializacion e ON e.id_especia = c.id_especia GROUP BY c.nivel, e.nom_especia, m.nombre_materia");

    return recorrer($query);
}

function EliminarMateCur($noMate, $nivel, $nom_especia)
{
    global $con;

    $query = $con->query("SELECT * FROM cursos_materias AS cm INNER JOIN curso c ON c.id_curso=cm.id_cursoMA INNER JOIN materia m 
        ON m.id_materia = cm.id_materiaCU INNER JOIN especializacion e 
        ON e.id_especia = c.id_especia WHERE c.nivel = '$nivel' AND e.nom_especia='$nom_especia' AND m.nombre_materia='$noMate'");


    $query = recorrer($query);
    var_dump($query);
    foreach ($query as $lista) {
        eliminarMC($lista["id_materiaCU"], $lista["id_curso"]);


        echo "<script> alert (" . $lista["id_curso"] . ")</script>";
    }
    header("location: CursosMaterias.php");
}

function eliminarMC($id_ma, $id_cur)
{
    global $con;
    $query = $con->query("DELETE FROM `cursos_materias` 
            WHERE `cursos_materias`.`id_materiaCU` = $id_ma AND cursos_materias.id_cursoMA=$id_cur");
}

function BuscarMateriaPorCUrso($especi, $nivel)
{
    global $con;
    $query = $con->query("SELECT m.id_materia,m.nombre_materia FROM `cursos_materias` INNER JOIN curso c 
    ON c.id_curso = cursos_materias.id_cursoMA INNER JOIN especializacion e ON e.id_especia = c.id_especia 
    INNER JOIN materia m ON m.id_materia = cursos_materias.id_materiaCU 
    WHERE e.id_especia ='$especi' and c.nivel='$nivel' GROUP BY m.nombre_materia, m.id_materia");

    return recorrer($query);
}
