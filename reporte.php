<?php
require('fpdf/fpdf.php');
require_once('modelo/general.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('450_1000.jpg',100,8,15);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(50, 10, 'Colegio Bolivariano', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
if (!isset($_GET["idCur"])) {

    if (isset($_GET["idUser"])) {
    } else {
        header("location: HorariosCur.php");
    }
}
if (!isset($_GET["idUser"])) {
    if (isset($_GET["idCur"])) {
    } else {
        header("location: prueba.php");
    }
}
if (isset($_GET["idCur"])) {
    $info = SelectCurso($_GET["idCur"]);
    $texto = "Reporte de el horario del paralelo " . $info[0]["paralelo"] . " Especalidad " . $info[0]["nom_especia"] . " De " . $info[0]["nivel"] . " nivel " . $info[0]["jornada"];
} else {
    $texto = "Horario de Maestro";
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(0, 10, $texto, 0, 0, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 16);
$dias = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
if (isset($_GET["idCur"])) {
    foreach ($dias as $key => $value) {
        $pdf->Cell(0, 10, $value, 0, 0, 'C');
        $pdf->Ln(10);

        $horarios = horariosCol($_GET['idCur'], $value);
        $pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
        $pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
        foreach ($horarios as $lista) {

            $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
            $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
        }
        $pdf->Ln(10);
    }
} else if (isset($_GET["idUser"])) {
    foreach ($dias as $key => $value) {
        $pdf->Cell(0, 10, $value, 0, 0, 'C');
        $pdf->Ln(10);

        $horarios = BuscarCursoMa($_GET['idUser'], $value);
        $pdf->Cell(25, 10, utf8_decode("hora"), 1, 0, 'C', 0);
        $pdf->Cell(25, 10, utf8_decode("Paralelo"), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, utf8_decode("Materia"), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, utf8_decode("Especialidad"), 1, 0, 'C', 0);
        $pdf->Cell(25, 10, utf8_decode("nivel"), 1, 1, 'C', 0);

        foreach ($horarios as $lista) {
            $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
            $pdf->Cell(25, 10, utf8_decode($lista['paralelo']), 1, 0, 'C', 0);
            $pdf->Cell(50, 10, utf8_decode($lista['nombre_materia']), 1, 0, 'C', 0);
            $pdf->Cell(50, 10, utf8_decode($lista['nom_especia']), 1, 0, 'C', 0);
            $pdf->Cell(25, 10, utf8_decode($lista['nivel']), 1, 1, 'C', 0);
        }
        $pdf->Ln(10);
    }
}

/* $pdf->Cell(0, 10, 'Lunes ', 0, 0, 'C');
$pdf->Ln(10);

$horarios = horariosCol($_GET['idCur'], "lunes");
$pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
$pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
foreach ($horarios as $lista) {

    $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
}
$pdf->Ln(10);


$pdf->Cell(0, 10, 'martes ', 0, 0, 'C');
$pdf->Ln(10);
$horarios = horariosCol($_GET['idCur'], "martes");
$pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
$pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
foreach ($horarios as $lista) {
    $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
}
$pdf->Ln(10);

$pdf->Cell(0, 10, 'miercoles ', 0, 0, 'C');
$pdf->Ln(10);
$horarios = horariosCol($_GET['idCur'], "miercoles");
$pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
$pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
foreach ($horarios as $lista) {
    $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
}
$pdf->Ln(10);

$pdf->Cell(0, 10, 'jueves ', 0, 0, 'C');
$pdf->Ln(10);
$horarios = horariosCol($_GET['idCur'], "jueves");
$pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
$pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
foreach ($horarios as $lista) {
    $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
}
$pdf->Ln(10);

$pdf->Cell(0, 10, 'viernes ', 0, 0, 'C');
$pdf->Ln(10);
$horarios = horariosCol($_GET['idCur'], "viernes");
$pdf->Cell(25, 10, utf8_decode("Hora"), 1, 0, 'C', 0);
$pdf->Cell(100, 10, utf8_decode("Materia"), 1, 1, 'C', 0);
foreach ($horarios as $lista) {
    $pdf->Cell(25, 10, utf8_decode($lista['hora']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($lista['nombre_materia']), 1, 1, 'C', 0);
} */

$pdf->Output();
