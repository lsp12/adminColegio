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
                        <h6 class="font-weight-bold">Formulario para ingresar maestros</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                        <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>lunes</h4>
                            <?php

                                    $horasMatutina=horariosCol($_GET['idCur'],"lunes");
                                    
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }
                                    
                                    ?>    
                                       
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>Martes</h4>
                            <?php

                                    
                                    $horasMatutina=horariosCol($_GET['idCur'],"martes");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }

                                    
                                    ?>    
                                     
                            
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>Miercoles</h4>
                            <?php

                                    $horasMatutina=horariosCol($_GET['idCur'],"miercoles");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }

                                    
                                    ?>    
                                       
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>jueves</h4>
                            <?php


                                    $horasMatutina=horariosCol($_GET['idCur'],"jueves");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }

                                    
                                    ?>    
                                       
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>Viernes</h4>
                            <?php

                                    $horasMatutina=horariosCol($_GET['idCur'],"viernes");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }

                                    ?>    
                                       
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>Sabado</h4>
                            <?php

                                    $horasMatutina=horariosCol($_GET['idCur'],"sabado");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
                                        </tr>        
                                        ';
                                    }
                                    
                                    ?>    
                                       
                            </tbody>
                          </table>
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>materia</th>
                                
                                <th>Accion</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <h4>Domingo</h4>
                            <?php

                                    $horasMatutina=horariosCol($_GET['idCur'],"domingo");
                                    foreach ($horasMatutina as $lista) {
                                        echo '
                                        <tr>
                                        <th scope="row">'.$lista['hora'].'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nombre_materia'].' por '.$lista['Nombre'].'</td>
                                            
                                            <td><a href="frm.php?idCur='.$lista['id_bascu'].'&idBasico='.$_GET['idCur'].'" type="button" class="btn btn-danger">Borrar</a></td>
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