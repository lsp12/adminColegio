<?php

function connectDatabase(){
    

    $host='localhost';
    $user='root';
    $pass='';
    $db='colegiosim3';
    $puerto=null;
    
    /* $host='mysql-11088-0.cloudclusters.net';
    $user='vera';
    $pass='1207345768';
    $db='colegio';
    $puerto=11136; */

    $mysqli = new mysqli($host,$user,$pass,$db,$puerto); 
    if($mysqli->connect_errno){
        $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
    }
    return $mysqli;
}

?>