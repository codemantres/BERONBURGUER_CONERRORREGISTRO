<?php
if (isset($_SESSION['correo_usuario'])) {
  ?>

<footer class=" text-dark mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="margen20 col-md-3">
                <img src="media/logoNombre.webp" alt="Logo" style="max-width: 180px;">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="margen20 col-md-6">
                        <h5>Menú</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.php">INICIO</a></li>
                            <li><a href="index.php?controlador=datos&action=carta">CARTA</a></li>
                            <li class="account"><a href="index.php?controlador=datos&action=user">RESERVAS</a></li>
                        </ul>
                    </div>
                    <div class="margen20 col-md-6">
                        <h5>Ofertas</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">No te pierdas nuestras ofertas semanales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="margen20 row mt-3">
            <div class="col text-center">
                <p>&copy; 2024 Berón Burguer. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php
} else {
  ?>
<footer class=" text-dark mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="margen20 col-md-3">
                <img src="media/logoNombre.webp" alt="Logo" style="max-width: 180px;">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="margen20 col-md-6">
                        <h5>Menú</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.php">INICIO</a></li>
                            <li><a href="index.php?controlador=datos&action=carta">CARTA</a></li>
                            <li class="account"><a href="index.php?controlador=datos&action=user">RESERVAS</a></li>
                        </ul>
                    </div>
                    <div class="margen20 col-md-6">
                        <h5>Ofertas</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">No te pierdas nuestras ofertas semanales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="margen20 row mt-3">
            <div class="col text-center">
                <p>&copy; 2024 Berón Burguer. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php
}
?>