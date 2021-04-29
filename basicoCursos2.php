<?php
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
                        <h6 class="font-weight-bold"><h6 class="font-weight-bold">formulario de asginaciones de maestros a los cursos</h6></h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                            <form class="row g-3" action="frm.php" method="POST">
                           
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Cursos</label>
                                    <select class="form-select" id="specificSizeSelect" name="cursosb" required>
                                        <option selected>Elija...</option>
                                        
                                    <?php
                                    $bus1=unserialize($_GET['busq']);
                                         foreach ($bus1 as $lista) {
                                          echo '<option value="'.$lista['id_curso'].'">'.$lista['paralelo'].'</option> ';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Dias</label>
                                    <select class="form-select" id="specificSizeSelect" name="diaCurso" required>
                                        <option selected>Elija...</option>
                                    <?php
                                    $dia=unserialize($_GET['dias']);
                                         foreach ($dia as $lista) {
                                          echo '<option value="'.$lista['id_dia'].'">'.$lista['dia_semana'].'</option> ';
                                        }
                                    ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Materia</label>
                                    <select class="form-select" id="specificSizeSelect" name="materi" required>
                                        
                                    <?php
                                    $mate=unserialize($_GET['mate']);
                                    if($mate!=null){
                                      echo "<option selected>Elija...</option>";
                                      
                                         foreach ($mate as $lista) {
                                          echo '<option value="'.$lista['id_materia'].'">'.$lista['nombre_materia'].'</option> ';
                                        }
                                    }
                                    
                                    ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="maestros2">Guardar</button>
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
            <!-- <section class="bg-secondary" id="table">
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
                                /* $i=1;
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
                                    } */
                                ?>
                                
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </section> -->
            
            
          </div>
          
         </div>

    </div>
    
    <script>
        function MyFuntion(){
            let h=document.getElementById("tcurso").value;
            let e=document.getElementById("nivel");
            
            
            if(h==1){
                /* document.getElementById("inputPassword4").value=null */
                
                /* let e=document.getElementById("nivel"); */
                let texto=' <label for="inputEmail4" class="form-label">Nivel</label>'+
                            '<select class="form-select" id="specificSizeSelect" name="Nivel" required>'+
                            '<option selected>Elija...</option>'+
                            '<option value="octavo">octavo</option>'+
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