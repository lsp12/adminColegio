<div>
    <div id="sidebar-container" class="pr">
        <div class="logo">
            <h4 class="text-light font-weight-bold">Sistema Acedemico</h4>
        </div>
        <div class="menu">
            <?php
            if (isset($_SESSION['admin'])) {
            ?>
                <a href="index.php" class="d-block p-3"><i class="bi bi-menu-button-wide-fill me-2 lead"></i><span>Principal</span></a>
                <a href="maestros.php" class="d-block p-3"><i class="bi bi-people-fill me-2 lead"></i><span>Ingresar Roles</span></a>
                <!-- <a href="FrmRegistro.php" class="d-block p-3"><i class="bi bi-hourglass-split me-2 lead"></i><span>Agregar Usuarios</span></a> -->
                <!-- <a href="Dias.php" class="d-block p-3"><i class="bi bi-calendar-day me-2 lead"></i><span>Dias Clase</span></a> -->
                <a href="formulariosBasicos.php" class="d-block p-3"><i class="bi bi-bezier me-2 lead"></i><span>Formulario Basico</span></a>
                <a href="CursosMaterias.php" class="d-block p-3"><i class="bi bi-spellcheck me-2 lead"></i><span>Agregar las Materia a los Cursos</span></a>
                <a href="Cursos.php" class="d-block p-3"><i class="bi bi-book-half me-2 lead"></i><span>Cursos</span></a>
                <a href="basicoCursos.php" class="d-block p-3"><i class="bi bi-book-half me-2 lead"></i><span>Asignar materias a los cursos</span></a>
                <a href="HorariosCur.php" class="d-block p-3"><i class="bi bi-book-half me-2 lead"></i><span>Ver cursos</span></a>
            <?php
            } else {

            ?>
                <a href="prueba.php" class="d-block p-3"><i class="bi bi-book-half me-2 lead"></i><span>Ver Horario</span></a>
            <?php
            }

            ?>

        </div>
    </div>
</div>