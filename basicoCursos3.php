<?php
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
                      <h6 class="font-weight-bold">formulario de asginaciones de maestros a los cursos</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                            <form class="row g-3" action="frm.php" method="POST">
                           
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Maestro</label>
                                    <select class="form-select" id="specificSizeSelect" name="maestrob" required>
                                        <option selected>Elija...</option>
                                        
                                    <?php
                                    $maestro=consultaMa($_GET['mate']);
                                         foreach ($maestro as $lista) {
                                          echo '<option value="'.$lista['id_maestro'].'">'.$lista['Nombre'].'</option> ';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Hora</label>
                                    <select class="form-select" id="specificSizeSelect" name="horab" required>
                                        <option selected>Elija...</option>
                                    <?php
                                    $hora=consultaHoras($_SESSION['jornada']);
                                         foreach ($hora as $lista) {
                                          echo '<option value="'.$lista['id_horario'].'">'.$lista['hora'].'</option> ';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Periodo academico</label>
                                    <select class="form-select" id="specificSizeSelect" name="periodoAca" required>
                                        <option selected>Elija...</option>
                                        <option value="noviembre-febrero_2021" >noviembre-febrero 2021</option>
                                        <option value="mayo-octubre_2021" >mayo-octubre 2021</option>
                                    </select>
                                </div>
                               
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="maestros3">Guardar</button>
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
?>