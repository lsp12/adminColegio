<?php
$title="Horas de Clase";
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
                        <h6 class="font-weight-bold">Formulario para ingresar las horas</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                            <form class="row g-3" action="frm.php" method="POST">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">ingrese la hora</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="hora" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">Jornada</label>
                                    
                                        <select class="form-select" id="specificSizeSelect" name="jornada" required>
                                        <option selected>Elija...</option>
                                        <option value="matutino">matutina</option>
                                        <option value="vespertino">vespertina</option>
                                        </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">Posicion</label>
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

                  <?php
                    include_once("assets/modulos/target.php");
                  ?>
                </div>
              </div>
              
            </section>
            <section class="bg-secondary">
              <div class="container">
                <div class="row">
                
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
                                <th>accion</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                    $horasMatutina=consultaHoras("matutino");
                                    foreach ($horasMatutina as $lista) {
                                        
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['posicion'].'</th>
                                            <td>'.$lista['hora'].'</td>
                                            <td><a href="eliminar.php?horas='.$lista['id_horario'].'" type="button" class="btn btn-danger">Borrar</a></td>
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
                                <th>Accion</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                    $horasVespertina=consultaHoras("vespertino");
                                    foreach ($horasVespertina as $lista) {
                                        
                                        echo '
                                        <tr>
                                            <th scope="row">'.$lista['posicion'].'</th>
                                            <td>'.$lista['hora'].'</td>
                                            <td><a href="eliminar.php?horas='.$lista['id_horario'].'" type="button" class="btn btn-danger">Borrar</a></td>
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