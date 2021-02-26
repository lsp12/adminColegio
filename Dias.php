<?php
$title="Dias de clase";
include_once("assets/modulos/head.php");
if(isset($_GET['num'])){
  echo '<script>alert("el dia ya esta ingresado"); </script>';
  unset($_GET['num']);
}
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
                            <form class="row g-3" action="frm.php" method="POST">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Ingresar Dia</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="dias" required>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="diasClase">Guardar</button>
                                </div>
                            </form>
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
            <section class="bg-secondary">
              <div class="container">
                <div class="row">
                
                  <div class="col-lg-8 my-3">
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
                                <th>Dia</th>
                                <th>accion</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                    $dias=consulta("dias");
                                    foreach ($dias as $lista) {
                                        
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['id_dia'].'</th>
                                            <td>'.$lista['dia_semana'].'</td>
                                            <td><a href="eliminar.php?dia='.$lista['id_dia'].'" type="button" class="btn btn-danger">Borrar</a></td>
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
              </div>
              
            </section>
            
          </div>
          
         </div>

    </div>
    
    
<?php
    include_once("assets/modulos/end-scrip.php");
?>