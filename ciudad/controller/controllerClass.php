
<?php

/**
 * Description of controllerClass
 @var cod_ciudad, nom_ciudad,cod_depto,habitantes son de tipo varchar
 *@ACCES Public function index,
 *public function create insertar datos,
 *public function update modificar datos
 ,public function delete eliminar datos
 *@param metodo POST 
 *@VAR $args,
 * @author LEYDY LUCIA CASTILLO MOSQUERA TADSI 545715 PRADERA MAÑANA
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

  public function create() {
    $template = 'create.php';
	/*is_numeric vuelve la variable numerica*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtCod_ciudad'])) {
        $rsp = modelClass::putNewCiudad($_POST['txtCod_ciudad'], $_POST['txtNom_ciudad'],$_POST['txtCod_depto'],$_POST['txtHabitantes']);
        if ($rsp === true) {
          $args['success'] = 'El registro fue realizado exitosamente';
          $this->index($args);
        } else {
          $args['error'] = $rsp->getMessage();
          $args['formAction'] = 'index.php?action=create';
          $args = array_merge($args, $_POST);
          viewClass::renderHTML($template, $args);
        }
      } 
     else {
      $args['formAction'] = 'index.php?action=create';
      viewClass::renderHTML($template, $args);
    }
  }

  public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_ciudad']) and is_numeric($_GET['cod_ciudad'])) {
      $certificate = modelClass::certifyCiudad($_GET['cod_ciudad']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_ciudad']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtCod_ciudad'] = $data[0]['cod_ciudad'];
              $args['txtNom_ciudad'] = $data[0]['nom_ciudad'];
              $args['txtCod_depto'] = $data[0]['cod_depto'];
              $args['txtHabitantes'] = $data[0]['habitantes']; 
            }
          } else {
            $args['error'] = $data;
            viewClass::renderHTML('error.php', $args);
          }
        }
      } else {
        $args['error'] = $certificate;
        viewClass::renderHTML('error.php', $args);
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_ciudad=' . $_GET['cod_ciudad'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['cod_ciudad'] = $_POST['txtCod_ciudad'];
      $data['nom_ciudad'] = $_POST['txtNom_ciudad'];
      $data['cod_depto'] = $_POST['txtCod_depto'];
      $data['habitantes'] = $_POST['txtHabitantes'];
      $rsp = modelClass::updateCiudad($_GET['cod_ciudad'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_ciudad=' . $_GET['cod_ciudad'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_ciudad=' . $_GET['cod_ciudad'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_ciudad']) and is_numeric($_GET['cod_ciudad'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteCiudad($_GET['cod_ciudad']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['cod_ciudad'] . ' fue eliminado exitosamente';
      } else {
        $args['error'] = $rsp;
        viewClass::renderHTML('error.php', $args);
      }
      $this->index($args);
    }
  }

  public function notFound() {
    
  }

}