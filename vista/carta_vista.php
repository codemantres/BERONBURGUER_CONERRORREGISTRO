<?php
require_once("menu.php");

echo '<div class="container text-center">';
echo '<h1 class="text-tipo">ENTRANTES</h1>';

if (isset($array_datos_producto)) {
    $contador = 0;
    foreach ($array_datos_producto as $value) {
        if (is_array($value)) {
            if ($value['tipo_p'] == "entrante") {

                if ($contador % 3 == 0) {
                    echo '<div class="row justify-content-center mb-4 mt-4">';
                }

                echo '<div class="card mx-3 custom-card">';
                echo '<img class="card-img-top" src="imgProductos/' . $value['imagen_p'] . '" alt="Imagen de producto">';
                echo '<div class="card-body">';
                echo '<h1 class="h5 card-title">' . $value['nombre_p'] . '</h1>';
                echo '<p class="card-text">' . $value['descripcion_p'] . '</p>';
                echo '<h2 class="h6 card-subtitle text-muted mb-2">' . $value['precio_p'] . ' €' . '</h2>';
                echo '<button class="btn btn-Modal btn-primary" data-toggle="modal" data-target="#productoModal1' . $contador . '">Ingredientes</button>';
                echo '</div>';
                echo '</div>';

                echo '<div class="modal fade" id="productoModal1' . $contador . '" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel' . $contador . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="productoModalLabel' . $contador . '">' . $value['nombre_p'] . '</h5>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<p class="card-text"><strong>Ingredientes:</strong></p>';
                echo '<p class="card-text text-center">' . $value['ingredientes_p'] . '</p>';
                echo '<p class="card-text"><strong>Cualquier duda consulte con nuestros camareros</strong></p>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                $contador++;

                if ($contador % 3 == 0) {
                    echo '</div>';
                }
            }
        }
    }

    if ($contador % 3 != 0) {
        echo '</div>';
    }
}

echo '</div>';

echo '<div class="container text-center">';
echo '<h1 class="text-tipo">PRINCIPALES</h1>';

if (isset($array_datos_producto)) {
    $contador = 0;
    foreach ($array_datos_producto as $value) {
        if (is_array($value)) {
            if ($value['tipo_p'] == "principal") {
                if ($contador % 3 == 0) {
                    echo '<div class="row justify-content-center mb-4 mt-4">';
                }

                echo '<div class="card mx-3 custom-card">';
                echo '<img class="card-img-top" src="imgProductos/' . $value['imagen_p'] . '" alt="Imagen de producto">';
                echo '<div class="card-body">';
                echo '<h1 class="h5 card-title">' . $value['nombre_p'] . '</h1>';
                echo '<p class="card-text">' . $value['descripcion_p'] . '</p>';
                echo '<h2 class="h6 card-subtitle text-muted mb-2">' . $value['precio_p'] . ' €' . '</h2>';
                echo '<button class="btn btn-Modal btn-primary" data-toggle="modal" data-target="#productoModal2' . $contador . '">Ingredientes</button>';
                echo '</div>';
                echo '</div>';
                echo '<div class="modal fade" id="productoModal2' . $contador . '" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel' . $contador . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="productoModalLabel' . $contador . '">' . $value['nombre_p'] . '</h5>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<p class="card-text"><strong>Ingredientes:</strong></p>';
                echo '<p class="card-text text-center">' . $value['ingredientes_p'] . '</p>';
                echo '<p class="card-text"><strong>Cualquier duda consulte con nuestros camareros</strong></p>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';


                $contador++;


                if ($contador % 3 == 0) {
                    echo '</div>';
                }
            }
        }
    }

    if ($contador % 3 != 0) {
        echo '</div>';
    }
}

echo '</div>';

echo '<div class="container text-center">';
echo '<h1 class="text-tipo">POSTRES</h1>';

if (isset($array_datos_producto)) {
    $contador = 0;
    foreach ($array_datos_producto as $value) {
        if (is_array($value)) {
            if ($value['tipo_p'] == "postre") {
                if ($contador % 3 == 0) {
                    echo '<div class="row justify-content-center mb-4 mt-4">';
                }

                echo '<div class="card mx-3 custom-card">';
                echo '<img class="card-img-top" src="imgProductos/' . $value['imagen_p'] . '" alt="Imagen de producto">';
                echo '<div class="card-body">';
                echo '<h1 class="h5 card-title">' . $value['nombre_p'] . '</h1>';
                echo '<p class="card-text">' . $value['descripcion_p'] . '</p>';
                echo '<h2 class="h6 card-subtitle text-muted mb-2">' . $value['precio_p'] . ' €' . '</h2>';
                echo '<button class="btn btn-Modal btn-primary" data-toggle="modal" data-target="#productoModal3' . $contador . '">Ingredientes</button>';
                echo '</div>';
                echo '</div>';
                echo '<div class="modal fade" id="productoModal3' . $contador . '" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel' . $contador . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="productoModalLabel' . $contador . '">' . $value['nombre_p'] . '</h5>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<p class="card-text"><strong>Ingredientes:</strong></p>';
                echo '<p class="card-text text-center">' . $value['ingredientes_p'] . '</p>';
                echo '<p class="card-text"><strong>Cualquier duda consulte con nuestros camareros</strong></p>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Cerrar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                $contador++;

                if ($contador % 3 == 0) {
                    echo '</div>';
                }
            }
        }
    }

    if ($contador % 3 != 0) {
        echo '</div>';
    }
}

echo '</div>';

echo '<div class="container text-center">';
echo '<h1 class="text-tipo">BEBIDAS</h1>';

if (isset($array_datos_producto)) {
    $contador = 0;
    foreach ($array_datos_producto as $value) {
        if (is_array($value)) {
            if ($value['tipo_p'] == "bebida") {
                if ($contador % 3 == 0) {
                    echo '<div class="row justify-content-center mb-4 mt-4">';
                }

                echo '<div class="card mx-3 custom-card">';
                echo '<img class="card-img-top" src="imgProductos/' . $value['imagen_p'] . '" alt="Imagen de producto">';
                echo '<div class="card-body">';
                echo '<h1 class="h5 card-title">' . $value['nombre_p'] . '</h1>';
                echo '<p class="card-text">' . $value['descripcion_p'] . '</p>';
                echo '<h2 class="h6 card-subtitle text-muted mb-2">' . $value['precio_p'] . ' €' . '</h2>';
                echo '</div>';
                echo '</div>';

                $contador++;

                if ($contador % 3 == 0) {
                    echo '</div>';
                }
            }
        }
    }

    if ($contador % 3 != 0) {
        echo '</div>';
    }
}


echo '</div>';
require_once("footer.php");


?>