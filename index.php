<?php
$title="Bienvenido";
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
            <section class="bg-mix">
              <div class="container">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="d-flex col-lg-3 stat my-log-3">
                        <div class="mx-auto" style="width:80%">
                          <h6 class="text-muted">Cantidad de alumnos</h6>
                          <h3 class="font-weight-bold">900</h3>
                          <h6 class="text-success"><i class="bi bi-arrow-up-circle-fill"></i>Cantidad de estudiantes matriculados: 56%</h6>
                        </div>
                      </div>
                      <div class="d-flex col-lg-3 stat my-log-3">
                        <div class="mx-auto" style="width:80%">
                          <h6 class="text-muted">Cantidad de alumnos</h6>
                          <h3 class="font-weight-bold">900</h3>
                          <h6 class="text-success"><i class="bi bi-arrow-up-circle-fill"></i>Cantidad de estudiantes matriculados: 56%</h6>
                        </div>
                      </div>
                      <div class="d-flex col-lg-3 stat my-log-3">
                        <div class="mx-auto" style="width:80%">
                          <h6 class="text-muted">Cantidad de alumnos</h6>
                          <h3 class="font-weight-bold">900</h3>
                          <h6 class="text-success"><i class="bi bi-arrow-up-circle-fill"></i>Cantidad de estudiantes matriculados: 56%</h6>
                        </div>
                      </div>
                      <div class="d-flex col-lg-3 my-log-3">
                        <div class="mx-auto" style="width:80%">
                          <h6 class="text-muted">Cantidad de alumnos</h6>
                          <h3 class="font-weight-bold">900</h3>
                          <h6 class="text-success"><i class="bi bi-arrow-up-circle-fill"></i>Cantidad de estudiantes matriculados: 56%</h6>
                        </div>
                      </div>
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
                        <h6 class="font-weight-bold">Numero de Estudiantes Matriculados</h6>
                      </div>
                      <div class="card-body">
                        <!-- <canvas id="myChart"></canvas> -->

                        <div class="container">
                          <div class="d-flex justify-content-end">
                            <h4>Filtrar por nombre: </h4>  <form action="javascript:void(0);" id="busquedaForm"><input type="text" id="valor" onkeyup="myFunction()"></form>
                          </div>
                          
                          <table class="table table-success table-striped">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                              </tr>
                            </thead>
                            <tbody id="cuerpo"></tbody>
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