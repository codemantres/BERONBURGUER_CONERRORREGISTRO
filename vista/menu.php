<?php
if (isset($_SESSION['correo_usuario'])) {
  ?>



<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="index.php"><img src="media/logoNombre.webp" alt="Imagen" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <li><a class="nav-link" href="index.php">INICIO</a></li>
      </li>
      <li class="nav-item">
      <li><a class="nav-link" href="index.php?controlador=datos&action=carta">CARTA</a></li>
      </li>
      <li class="nav-item">
      <li><a class="nav-link" href="index.php?controlador=datos&action=user">MI CUENTA</a></li>
      </li>
      <li class="nav-item">
      <li><a class="nav-link" href="index.php?controlador=datos&action=desconectar">CERRAR SESION</a></li>
      </li>
    </ul>
  </div>
</nav>


<?php
} else {
  ?>

<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="index.php"><img src="media/logoNombre.webp" alt="Imagen" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <li><a class="nav-link" href="index.php">INICIO</a></li>
      </li>
      <li class="nav-item">
      <li><a class="nav-link" href="index.php?controlador=datos&action=carta">CARTA</a></li>
      </li>
      <li class="nav-item">
      <li><a class="nav-link" href="index.php?controlador=datos&action=user">INICIAR SESION</a></li>
      </li>
    </ul>
  </div>
</nav>

<?php
}
?>