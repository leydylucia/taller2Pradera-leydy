<?php

/**
 * Descripcion de la clase controlador
 *
 * 
 */
class controllerClass {

    public function index($args = NULL) { //funcion que va a hacer el index 
        $args['datos'] = modelClass::getAll();

        if (is_array($args['datos'])) { // pregunta si es un arreglo o comprueba si es un arreglo
            viewClass::renderHTML('index.php', $args); // se va a la clase view y me muestra el render HTML index.php
        } else {
            viewClass::renderHTML('error.php', $args); //se va a la clase view y muestr ale render html error.php
        }
    }

}
