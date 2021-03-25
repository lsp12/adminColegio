<?php

include_once("assets/modulos/head.php");
$title="Bienvenido ";

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
                $cursoAgr=targetas();
            ?>
            <section class="bg-mix">
              <div class="container">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="bg-secondary">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 my-3">
                    <div class="card">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold">Cursos creados</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                          
                          
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>N°</th>
                                <th>Nivel</th>
                                <th>Jornada</th>
                                <th>Especialidad</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                              foreach ($cursoAgr as $lista ) {
                                echo '
                                <tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$lista['nivel'].'</td>
                                            <td>'.$lista['jornada'].'</td>
                                            <td>'.$lista['nom_especia'].'</td>
                                            
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