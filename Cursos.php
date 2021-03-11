<?php
$title="Cursos";
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
                        <h6 class="font-weight-bold">Formulario para ingresar los cursos del colegio</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                            <form class="row g-3" action="frm.php" method="POST">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Paralelo</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="paralelo" required>
                                </div>
                                <div class="col-6">
                                    <label for="inputEmail4" class="form-label">Tipo de curso</label>
                                        
                                        <select id="tcurso" class="form-select" onclick="MyFuntion()" name="tipoC" required>
                                        <option selected>Elija...</option>
                                        <?php
                                            $consulta=consulta('especializacion');
                                            foreach ($consulta as $lista) {
                                                echo '
                                                <option value="'.$lista['id_especia'].'">'.$lista['nom_especia'].'</option>
                                                    ';
                                            }
                                        ?>
                                        </select>
                                </div>
                                <div class="col-3" id="nivel">
                                    <!-- <label for="inputAddress2" class="form-label">Nivel</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="Nivel" required> -->
                                    <label for="inputEmail4" class="form-label">Nivel</label>
                                      <select class="form-select" id="specificSizeSelect" name="JornadaCuerso" required>
                                      
                                      </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">Jornada</label>
                                        
                                        <select class="form-select" id="specificSizeSelect" name="JornadaCuerso" required>
                                        <option selected>Elija...</option>
                                        <option value="matutino">matutina</option>
                                        <option value="vespertino">vespertina</option>
                                        </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="CursosA">Guardar</button>
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
                  <div class="col-lg-6 my-3">
                    <div class="card">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold">Maestros registrados</h6>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-sm table-success table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Paralelo</th>
                                <th>especialidad</th>
                                <th>nivel</th>
                                <th>jornada</th>
                                <th>Accion</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                    $cursos=consultaCursos("vespertino");
                                    foreach ($cursos as $lista) {
                                        
                                        echo '
                                        <tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nom_especia'].'</td>
                                            <td>'.$lista['nivel'].'</td>
                                            <td>'.$lista['jornada'].'</td>
                                            <td><a href="eliminar.php?cursos='.$lista['id_curso'].'" type="button" class="btn btn-danger">Borrar</a></td>
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

                  <div class="col-lg-6 my-3">
                    <div class="card">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold">horas de matutino</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="table-responsive">
                        <table class="table table-success table-striped">
                            <thead>
                              <tr>
                              <th>#</th>
                                <th>Paralelo</th>
                                <th>especialidad</th>
                                <th>nivel</th>
                                <th>jornada</th>
                                <th>Accion</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                    $Cursos=consultaCursos("matutino");
                                    $i=1;
                                    foreach ($Cursos as $lista) {
                                        
                                        echo '
                                        <tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$lista['paralelo'].'</td>
                                            <td>'.$lista['nom_especia'].'</td>
                                            <td>'.$lista['nivel'].'</td>
                                            <td>'.$lista['jornada'].'</td>
                                            <td><a href="eliminar.php?cursos='.$lista['id_curso'].'" type="button" class="btn btn-danger">Borrar</a></td>
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
        function MyFuntion(){
            let h=document.getElementById("tcurso").value;
            let e=document.getElementById("nivel");
            if(h==1){
                /* let e=document.getElementById("nivel"); */
                let texto=' <label for="inputEmail4" class="form-label">Nivel</label>'+
                            '<select class="form-select" id="specificSizeSelect" name="Nivel" required>'+
                            '<option selected>Elija...</option>'+
                            '<option value="octavo">Octavo</option>'+
                            '<option value="noveno">noveno</option>'+
                            '<option value="decimo">decimo</option>'+
                            '</select>';
            e.innerHTML=texto;
            }else if(h=="Elija..."){
              let texto=' <label for="inputEmail4" class="form-label">Nivel</label>'+
                            '<select class="form-select" id="specificSizeSelect" name="Nivel" required>'+
                            
                            '</select>';
            e.innerHTML=texto;
            }else{
              let texto2=' <label for="inputEmail4" class="form-label">Nivel</label>'+
                            '<select class="form-select" id="specificSizeSelect" name="Nivel" required>'+
                            '<option selected>Elija...</option>'+
                            '<option value="Primero Bachiller">Primero Bachiller</option>'+
                            '<option value="Segundo Bachiller">Segundo Bachiller</option>'+
                            '<option value="Tercero Bachiller">Tercero Bachiller</option>'+
                            '</select>';
            e.innerHTML=texto2;
            }
            
        }
    </script>
<?php
    include_once("assets/modulos/end-scrip.php");
?>