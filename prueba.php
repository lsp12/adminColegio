<?php
$title = "Horas de Clase";
include_once("assets/modulos/head.php");
?>

<div class="d-flex">
    <?php
    include_once("assets/modulos/sidebar.php");
    ?>
    <div class="w-100">

        <?php
        include_once("assets/modulos/navbar.php");
        ?>

        <div id="content">
            <?php
            include_once("assets/modulos/section.php");
            ?>

            <section class="bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Formulario para ingresar maestros</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->

                                    <div class="container">
                                        <?php
                                        $dias = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
                                        echo '<a href="reporte.php?idUser=' . $_SESSION["maestro"] .'" type="button" class="btn btn-primary">Generar Documento</a> <br><br>';
                                        foreach ($dias as $dia => $value) {
                                            echo $value;

                                        ?>

                                            <table class="table table-success table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Paralelo</th>
                                                        <th>materia</th>
                                                        <th>Especialidad</th>
                                                        <th>nivel</th>
                                                        <th>Accion</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    
                                                    $horasMatutina = BuscarCursoMa($_SESSION["maestro"], $value);

                                                    foreach ($horasMatutina as $lista) {
                                                        echo '
                                        <tr>
                                        <th scope="row">' . $lista['hora'] . '</th>
                                            <td>' . $lista['paralelo'] . '</td>
                                            <td>' . $lista['nombre_materia'] . ' por ' . $lista['Nombre'] . '</td>
                                            <td>' . $lista['nom_especia'] . '</td>
                                            <td>' . $lista['nivel'] . '</td>
                                            
                                            
                                            <td><a href="frm.php?idMa=' . $lista['id_bascu'] .'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                                    }

                                                    ?>

                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        include_once("assets/modulos/target.php");
                        ?>
                    </div>
                </div>

            </section>


        </div>

    </div>

</div>


<?php
include_once("assets/modulos/end-scrip.php");
?>