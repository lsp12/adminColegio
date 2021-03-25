<?php
$title="Horarios por cursos";
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
                        
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                        <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>Especializacion</th>
                                <th>Seccion</th>
                                <th>Nivel</th>
                                <th>Ver Horario</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_SESSION['admin'])){
                                  $horasMatutina=Ver_cursos();
                                }else{
                                  $horasMatutina=Ver_cursoMa($_SESSION['maestro']);
                                }
                                    
                                    
                                    foreach ($horasMatutina as $lista) {
                                        
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['id_curso'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nom_especia'].'</td>
                                            <td>'.$lista['jornada'].'</td>
                                            <td>'.$lista['nivel'].'</td>
                                            <td><a href="HorariosCur2.php?idCur='.$lista['id_curso'].'" type="button" class="btn btn-danger">Ver horario</a>
                                            <a href="reporte.php?idCur='.$lista['id_curso'].'" type="button" class="btn btn-danger my-2">Generar reporte</a>
                                            </td>
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