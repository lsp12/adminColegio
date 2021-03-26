<?php
require_once('modelo/general.php');
$hora=consultaHoras("vespertino");
$arreglo=[];
foreach ($hora as $lista ) {
    $arreglo[]=$lista["hora"];
}

echo "arreglo originarl";
sort($arreglo, SORT_STRING);
print_r($arreglo);
/* 
$arreglo = [
    "2019-07-30 07:00:00",
    "2002-11-24 13:15:20",
    "2007-10-29 15:27:32",
];
echo "Arreglo antes de ordenar: ";
print_r($arreglo);

sort($arreglo, SORT_STRING);
echo "Arreglo DESPUÉS de ordenar: ";
print_r($arreglo); */
?>
