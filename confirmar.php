<?php
ob_start();
session_start();
$title="Asignacion de horarios y materias a los Cursos";
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
                                $mae=consultarMaestr($_SESSION['id_maestro']);
                                $cur=consultaCruso($_SESSION['cursos']);
                                $hora=consultaHor($_SESSION['color']);
                                $dia=consultaDia($_SESSION['dia']);
                                
                            ?>
                            <h2><p>Confirmarcion de datos</p></h2>
                            <p>Maestro:<?php echo $mae[0]['Nombre']." ".$mae[0]['Apellido'] ?></p>
                            <p>Materia: <?php echo $mae[0]['nombre_materia'] ?></p>
                            <p>Curso:<?php echo $cur[0]['paralelo'] ?></p>
                            <p>nivel:<?php echo $cur[0]['nivel'] ?></p>
                            <p>especialidad:<?php echo $cur[0]['nom_especia'] ?></p>
                            <p>Seccion:<?php echo $cur[0]['jornada'] ?></p>
                            <p>hora:<?php echo $hora[0]['hora'] ?></p>
                            <p>dia: <?php echo $dia[0]['dia_semana'] ?></p>
                            <p>Periodo: <?php echo $_SESSION['periodo'] ?></p>
                            <?php
                                echo '<a href="frm.php?id_maestro='.$_SESSION["id_maestro"].'&id_curso='.$_SESSION['cursos'].'&id_hora='.$_SESSION['color'].'&id_dia='.$_SESSION['dia'].'&txt_periodo='.$_SESSION['periodo'].'&enviarfin=" class="btn btn-primary">Guardar</a>';
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
            <section class="bg-secondary" id="table">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 my-3">
                    <div class="card">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold">Maestros registrados</h6>
                      </div>
                      <div class="card-body">
                        <div class="container">
                        <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Materia</th>
                                <th>accion</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                    $maestros=consultaMaestros();
                                    foreach ($maestros as $lista) {
                                        
                                        echo '
                                        <tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$lista['cedula'].'</td>
                                            <td>'.$lista['Nombre'].'</td>
                                            <td>'.$lista['sexo'].'</td>
                                            <td>'.$lista['nombre_materia'].'</td>
                                            <td><a href="#" type="button" class="btn btn-danger">Borrar</a></td>
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
    
<?php
    include_once("assets/modulos/end-scrip.php");
    ob_end_flush();
?>