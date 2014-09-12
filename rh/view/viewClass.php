<?php
/**
 * Description of viewClass
 *@var $arg son argumentos que van al controller
 * @autor leydy lucia castillo mosquera tadsi 545715
 */

class viewClass {

  /**
   * Método para renderizar el resultado final (la Vista)
   * @param string $view Nombre del template a usar
   * @param array $args Variables a pasar a la vista
   */
  static public function renderHTML($view, $args = NULL) {
    if (is_array($args)) {
      extract($args);
    }
    include_once 'templates/' . $view;
  }

}
