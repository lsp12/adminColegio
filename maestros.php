<?php
$title = "Agregar maestros";
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
      <h3>Escoja un formulario:</h3>
      <select id="tcurso" class="form-select" onclick="MyFuntion()" name="tipoC" required>
        <option selected>Elija...</option>
        <option value="Maestros">Ingresar Maestros</option>
        <option value="Administrador">Ingresar Administrador</option>
      </select>
      <section class="bg-secondary">
        <div class="container">
          <div id="maestros" class="row">
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
                        <label for="inputEmail4" class="form-label">cedula</label>
                        <input type="text" class="form-control" id="inputEmail4" name="cedula" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">nombre</label>
                        <input type="text" class="form-control" id="inputPassword4" name="nombre" required>
                      </div>
                      <div class="col-6">
                        <label for="inputAddress" class="form-label">apellido</label>
                        <input type="text" class="form-control" id="inputAddress" name="apellido" required>
                      </div>
                      <div class="col-3">
                        <label for="inputAddress2" class="form-label">edad</label>
                        <input type="text" class="form-control" id="inputAddress2" name="edad" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputCity" class="form-label">Sexo</label>
                        <input type="text" class="form-control" id="inputCity" name="sexo" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputCity" class="form-label">ciudad</label>
                        <input type="text" class="form-control" id="inputCity" name="ciudad" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputCity" class="form-label">direccion</label>
                        <input type="text" class="form-control" id="inputCity" name="direccion" required>
                      </div>
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Materia</label>
                        <select class="form-select" id="specificSizeSelect" name="mate" required>
                          <option selected>Elija...</option>
                          <?php
                          $materia = consulta('materia');
                          foreach ($materia as $lista) {
                            echo '
                                            <option value="' . $lista['id_materia'] . '">' . $lista['nombre_materia'] . '</option>  
                                            ';
                          }
                          ?>

                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputEmail4" name="correoMa" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="inputPassword4" name="conMa" required>
                      </div>
                      <div class="col-6">
                        <label for="inputAddress" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control" id="inputAddress" name="conMa2" required>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="maestrosPrim">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div id="admin" class="row">
            <div class="col-lg-8 my-3">
              <div class="card">
                <div class="card-header bg-light">

                  <h6 class="font-weight-bold">Formulario para ingresar Administradores</h6>
                </div>
                <div class="card-body">
                  <!-- <canvas id="myChart"></canvas> -->

                  <div class="container">
                    <form class="row g-3" action="frm.php" method="POST">
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputEmail4" name="correoAdmin" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="inputPassword4" name="conAdmin" required>
                      </div>
                      <div class="col-6">
                        <label for="inputAddress" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control" id="inputAddress" name="conAdmin2" required>
                      </div>

                  </div>
                  <div class="col-12 my-3">
                    <button type="submit" class="btn btn-primary" name="InserADM">Guardar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>


      </section>
      <section class="bg-secondary">
        <div class="container">
          <div id="tmaestro" class="row">
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
                        $i = 1;
                        $maestros = consultaMaestros();
                        foreach ($maestros as $lista) {

                          echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $lista['cedula'] . '</td>
                                            <td>' . $lista['Nombre'] . '</td>
                                            <td>' . $lista['sexo'] . '</td>
                                            <td>' . $lista['nombre_materia'] . '</td>
                                            <td><a href="eliminar.php?maestros=' . $lista['id_maestro'] . '" type="button" class="btn btn-danger">Borrar</a></td>
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

          <div id="tadmin" class="row">
            <div class="col-lg-8 my-3">
              <div class="card">
                <div class="card-header bg-light">
                  <h6 class="font-weight-bold">Administradores registrados registrados</h6>
                </div>
                <div class="card-body">
                  <div class="container">
                    <table class="table table-success table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Correo</th>
                          <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $maestros = consultaLogin();
                        foreach ($maestros as $lista) {

                          echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $lista['correoadm'] . '</td>
                                            
                                            <td><a href="eliminar.php?AdminLog=' . $lista['id_loginadm'] . '" type="button" class="btn btn-danger">Borrar</a></td>
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
  let e = document.getElementById("maestros");
  let horas = document.getElementById("admin");


  let tmaestro = document.getElementById("tmaestro");
  let tadmin = document.getElementById("tadmin");



  let error = getParameterByName("error");
  let url = getParameterByName("selec");
  window.history.replaceState({}, '', 'maestros.php');

  e.style.display = "none";
  horas.style.display = "none";

  tmaestro.style.display = "none";
  tadmin.style.display = "none";

  if (error == "true") {
    alert("cedula o correo ya esta en uso");
  } else if (error == "contraseña") {
    alert("Contraseña no conciden");
  } else if (error == "correo") {
    alert("Correo ya esta registrado");
  }

  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  if (url == "Maestros") {
    e.style.display = "block";
    horas.style.display = "none";

    tmaestro.style.display = "block";
    tadmin.style.display = "none";
  } else if (url == "Administrador") {
    e.style.display = "none";
    horas.style.display = "block";

    tmaestro.style.display = "none";
    tadmin.style.display = "block";
  } else {
    e.style.display = "none";
    horas.style.display = "none";

    tmaestro.style.display = "none";
    tadmin.style.display = "none";
  }

  function MyFuntion() {
    let h = document.getElementById("tcurso").value;
    console.log("escojio algo" + h);
    if (h == "Maestros") {
      e.style.display = "block";
      horas.style.display = "none";


      tmaestro.style.display = "block";
      tadmin.style.display = "none";

    } else if (h == "Administrador") {
      e.style.display = "none";
      horas.style.display = "block";

      tmaestro.style.display = "none";
      tadmin.style.display = "block";
    } else {
      e.style.display = "none";
      horas.style.display = "none";

      tmaestro.style.display = "none";
      tadmin.style.display = "none";
    }
    /////////////////////////////////////////////////////////////////////



  }
</script>
<?php
include_once("assets/modulos/end-scrip.php");
?>