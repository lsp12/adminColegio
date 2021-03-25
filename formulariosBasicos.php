<?php
$title = "Funciones Basicas";
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

            <div class="">
                <h3>Escoja un formulario:</h3>
                <select id="tcurso" class="form-select" onclick="MyFuntion()" name="tipoC" required>
                    <option selected>Elija...</option>
                    <option value="Horas">Ingresar Horas</option>
                    <option value="materias">Ingresar materias</option>
                    <option value="especializaciones">Ingresar especializaciones</option>

                </select>
                <section class="bg-secondary">
                    <div class="row container">


                        <div id="materias" class="col-lg-12 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Formulario para ingresar las materias</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->

                                    <div class="container">
                                        <form class="row g-3" action="frm.php" method="POST">
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">Materia</label>
                                                <input type="text" class="form-control" id="inputCity" name="Materia" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputPassword4" class="form-label">descripcion</label>
                                                <textarea name="descripcionM" cols="20" rows="5" class="form-control" id="inputPassword4" required></textarea>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="guardarMateria">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="especialidad" class="col-lg-12 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Formulario para ingresar las especializaciones del colegio</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->

                                    <div class="container">
                                        <form class="row g-3" action="frm.php" method="POST">
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Nombre de la especializacion</label>
                                                <input type="text" class="form-control" id="inputEmail4" name="nombreE" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputPassword4" class="form-label">descripcion</label>
                                                <textarea name="descripcion" cols="20" rows="5" class="form-control" id="inputPassword4" required></textarea>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="especial">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="horas" class="col-lg-12 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Formulario para ingresar las horas</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->


                                    <form class="row g-3" action="frm.php" method="POST">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">ingrese la hora</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="hora" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputEmail4" class="form-label">Jornada</label>

                                            <select class="form-select" id="specificSizeSelect" name="jornada" required>
                                                <option >Elija...</option>
                                                <option value="matutino">matutina</option>
                                                <option value="vespertino">vespertina</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputEmail4" class="form-label">Posicion en el horario</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="posicion" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" name="horasAca">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>

            </section>
            <section class="bg-secondary pt-1">
                <div class="container">
                    <div id="thoras" class="row">

                        <div class="col-lg-6 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">horas de matutino</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->

                                    <div class="container">
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>horas</th>
                                                    <th>Posicion en el horario</th>
                                                    <th>accion</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $horasMatutina = consultaHoras("matutino");
                                                foreach ($horasMatutina as $lista) {

                                                    echo '
                                        <tr>
                                        <th scope="row">' . $lista['posicion'] . '</th>
                                            <td>' . $lista['hora'] . '</td>
                                            <td>' . $lista['posicion'] . '</td>
                                            <td><a href="eliminar.php?horas=' . $lista['id_horario'] . '" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">horas de vespertino</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart"></canvas> -->

                                    <div class="container">
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>horas</th>
                                                    <th>Posicion en el horario</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $horasVespertina = consultaHoras("vespertino");
                                                foreach ($horasVespertina as $lista) {

                                                    echo '
                                        <tr>
                                            <th scope="row">' . $lista['posicion'] . '</th>
                                            <td>' . $lista['hora'] . '</td>
                                            <td>' . $lista['posicion'] . '</td>
                                            <td><a href="eliminar.php?horas=' . $lista['id_horario'] . '" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tespecializacion" class="row">
                        <div class="col-lg-8 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Especializaciones</h6>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>especialidad</th>
                                                    <th>accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $esp = consulta("especializacion");
                                                foreach ($esp as $lista) {

                                                    echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $lista['nom_especia'] . '</td>
                                            <td><a href="eliminar.php?espe=' . $lista['id_especia'] . '" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tmaterias" class="row">
                        <div class="col-lg-8 my-3">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold">Materias</h6>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Materias</th>
                                                    <th>accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $esp = consulta("materia");
                                                foreach ($esp as $lista) {

                                                    echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $lista['nombre_materia'] . '</td>
                                            <td><a href="eliminar.php?mate=' . $lista['id_materia'] . '" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                                    $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </div>

    </div>

</div>

<script>
    let e = document.getElementById("materias");
    let horas = document.getElementById("horas");
    let especialid = document.getElementById("especialidad");

    let tmaterias = document.getElementById("tmaterias");
    let thoras = document.getElementById("thoras");
    let tespecialid = document.getElementById("tespecializacion");

    tmaterias.style.display = "none";
    tespecialid.style.display = "none";
    thoras.style.display = "none";

    e.style.display = "none";
    horas.style.display = "none";
    especialid.style.display = "none";

    let url = getParameterByName("selec");
    let error = getParameterByName("error");
    console.log(url + " hjola mundo "+error);
    window.history.replaceState({}, '', 'formulariosBasicos.php');

    if (error=="true") {
        alert("Dato repetido");
    }
    
    MyFuntion();
    
    if (url == "materias") {
            e.style.display = "block";
            horas.style.display = "none";
            especialid.style.display = "none";

            tmaterias.style.display = "block";
            tespecialid.style.display = "none";
            thoras.style.display = "none";

        } else if (url == "Horas") {
            e.style.display = "none";
            horas.style.display = "block";
            especialid.style.display = "none";

            tmaterias.style.display = "none";
            tespecialid.style.display = "none";
            thoras.style.display = "block";

        } else if (url == "especializaciones") {
            e.style.display = "none";
            horas.style.display = "none";
            especialid.style.display = "block";

            tmaterias.style.display = "none";
            tespecialid.style.display = "block";
            thoras.style.display = "none";

        } else {
            e.style.display = "none";
            horas.style.display = "none";
            especialid.style.display = "none";

            tmaterias.style.display = "none";
            tespecialid.style.display = "none";
            thoras.style.display = "none";
        }


    function MyFuntion() {
        let h = document.getElementById("tcurso").value;
        console.log("escojio algo");
        if (h == "materias") {
            e.style.display = "block";
            horas.style.display = "none";
            especialid.style.display = "none";

            tmaterias.style.display = "block";
            tespecialid.style.display = "none";
            thoras.style.display = "none";

        } else if (h == "Horas"){
            e.style.display = "none";
            horas.style.display = "block";
            especialid.style.display = "none";

            tmaterias.style.display = "none";
            tespecialid.style.display = "none";
            thoras.style.display = "block";

        } else if (h == "especializaciones") {
            e.style.display = "none";
            horas.style.display = "none";
            especialid.style.display = "block";

            tmaterias.style.display = "none";
            tespecialid.style.display = "block";
            thoras.style.display = "none";

        } else {
            e.style.display = "none";
            horas.style.display = "none";
            especialid.style.display = "none";

            tmaterias.style.display = "none";
            tespecialid.style.display = "none";
            thoras.style.display = "none";
        }

    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
</script>
<?php
include_once("assets/modulos/end-scrip.php");
?>