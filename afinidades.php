<?php
$title="Ingresar Materias";
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
                                $i=1;
                                    $esp=consulta("materia");
                                    foreach ($esp as $lista) {
                                        
                                        echo '
                                        <tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$lista['nombre_materia'].'</td>
                                            <td><a href="eliminar.php?mate='.$lista['id_materia'].'" type="button" class="btn btn-danger">Borrar</a></td>
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