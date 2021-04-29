<?php
$title = "Asignacion de horarios y materias a los Cursos";
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
                  <h6 class="font-weight-bold">formulario de asginaciones de Maestros a los cursos</h6>
                </div>
                <div class="card-body">


                  <div class="container">
                    <form class="row g-3" action="frm.php" method="POST">

                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Materia</label>
                        <select class="form-select" id="specificSizeSelect" name="materia" required>
                          <option selected>Elija...</option>
                          <?php
                          $materia = consulta("materia");
                          foreach ($materia as $lista) {
                            echo '
                                            <option value="' . $lista['id_materia'] . '">' . $lista['nombre_materia'] . '</option>  
                                            ';
                          }
                          ?>

                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Nivel Y Curso</label>
                        <select class="form-select" id="tcurso" name="NivelCurs" required>
                          <option selected>Elija...</option>
                          <?php
                          $nivelCuro = NivelesCurso();
                          foreach ($nivelCuro as $lista) {
                            echo "<option value='" . $lista['nivel'] . ":" . $lista['nom_especia'] . "' > " . $lista['nivel'] . " -- " . $lista['nom_especia'] . " </option>";
                          }
                          ?>

                        </select>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="MateriasUNir">Guardar</button>
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
                          <th>Materias</th>
                          <th>Nivel</th>
                          <th>Especalidad</th>
                          <th>accion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $esp = MostrarCUMA();
                        foreach ($esp as $lista) {

                          echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $lista['nombre_materia'] . '</td>
                                            <td>' . $lista['nivel'] . '</td>
                                            <td>' . $lista['nom_especia'] . '</td>
                                            <td><a href="frm.php?mate=' . $lista['nombre_materia'] . '&nivel=' . $lista['nivel'] . '&espcia=' . $lista['nom_especia'] . '&elminarMC=" type="button" class="btn btn-danger">Borrar</a></td>
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
let error = getParameterByName("error");
if(error=="true"){
  alert("ya a sido agregado esa materia a ese nivel");
}
function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
</script>
<?php
include_once("assets/modulos/end-scrip.php");
?>