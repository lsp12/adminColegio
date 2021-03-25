<?php
session_start();
include_once('assets/login/head.php');
include_once('assets/login/body-class.php');
require_once('modelo/general.php');

if (isset($_SESSION['maestro'])) {
  header("location: index.php");
}else if(isset($_SESSION['admin'])){
  header("location: index.php");
}

if (isset($_POST['enviar'])) {
  $email = $_POST["email"];
  $clave = $_POST["clave"];
  if ($email != '' || $clave != '') {
    $res = confirmarCorreo($email, $_POST['rol']);
    /* echo var_dump($res); */
    if ($res != []) {
      // al general el password hast retonar una cadena mayor a 50
      // el campo clave solo acepta 50 caracteres, modificala para que soporte 100.
      if ($_POST['rol'] == "Maestro") {

        if (password_verify($clave, $res[0]['contraseñama']) > 0) {
          if ("admin@gmail.com" == $email) {
            $_SESSION['maestro'] = $res[0]['id_maestro '];
            echo '<script> alert ("ingresado correctamente") </script>';
            header('location: index.php');
          } else {

            $_SESSION['maestro'] = $res[0]['id_maestro'];
            echo '<script> alert ("ingresado como maestro") </script>';
            header('location: index.php');
          }
        } else {
          echo '<script> alert ("Datos incorrectos, revise y vuelva ha intentarlo") </script>';
        }

      } else if ($_POST['rol'] == "Administrador") {
        if (password_verify($clave, $res[0]['contraseñaadm']) > 0) {
          if ("admin@gmail.com" == $email) {
            $_SESSION['admin'] = $res[0]['id_loginadm '];
            echo '<script> alert ("ingresado correctamente") </script>';
            header('location: index.php');
          } else {

            $_SESSION['admin'] = $res[0]['id_loginadm'];
            echo '<script> alert ("ingresado como administrador") </script>';
            header('location: index.php');
          }
        } else {
          echo '<script> alert ("Datos incorrectos, revise y vuelva ha intentarlo") </script>';
        }
      }
    } else {
      echo '<script> alert ("Datos incorrectos, revise y vuelva ha intentarlo") </script>';
    }
  }
}
?>

<div class="bg-warning text-dark p-5 d-flex align-content-center flex-wrap backcolor" style="min-width: 25rem; max-width: 15rem">

  <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="d-flex justify-content-center"><i class="bi bi-person-fill fs-1"></i></div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="clave">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Rol</label>
      <select name="rol" id="" class="form-control">
        <option selected>elije...</option>
        <option value="Administrador">Administrador</option>
        <option value="Maestro">Maestro</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary" name="enviar">Iniciar Sesion</button>
    <!-- <div class="mt-3">
                  <a href="registrar.php">Registrarse a hora!</a>
                </div> -->

  </form>


  <?php
  include_once('assets/login/head-end.php');
  ?>