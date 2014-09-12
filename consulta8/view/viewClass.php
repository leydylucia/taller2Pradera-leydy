<?php

/**
 * Description of viewClass
 *
 * @author Bayron Henao
 */
class viewClass {

    /**
     * Método para renderizar el resultado final (la Vista)
     * @param string $view Nombre del template a usar
     * @param array $args Variables a pasar a la vista
     */
    static public function renderHTML($view, $args = NULL) {
        if (is_array($args)) { //pregunta si la variable $args es un arreglo
            extract($args); //extrae los datos del arreglo y los vuelve variables en php
        }
        include_once 'templates/' . $view;
    }

}
