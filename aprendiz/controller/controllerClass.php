
<?php

/**
 * Description of controllerClass
 *@VAR  $id_apre,$nom_apre,aprel_apre,tel_apre
 *@var cod_ciudad,cod_tipo_id,cod_rh,genero,edad son de tipo string
 *
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtId_apre'])) {
        $rsp = modelClass::putNewAprendiz($_POST['txtId_apre'], $_POST['txtNom_apre'],$_POST['txtApel_apre'],$_POST['txtTel_apre'],$_POST['txtCod_ciudad'],$_POST['txtCod_tipo_id'],$_POST['txtCod_rh'],$_POST['txtGenero'],$_POST['txtEdad']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id_apre']) and is_numeric($_GET['id_apre'])) {
      $certificate = modelClass::certifyAprendiz($_GET['id_apre']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['id_apre']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtId_apre'] = $data[0]['id_apre'];
              $args['txtNom_apre'] = $data[0]['nom_apre'];
              $args['txtApel_apre'] = $data[0]['apel_apre'];
              $args['txtTel_apre'] = $data[0]['tel_apre'];
              $args['txtCod_ciudad'] = $data[0]['cod_ciudad'];
              $args['txtCod_tipo_id'] = $data[0]['cod_tipo_id'];
              $args['txtCod_rh'] = $data[0]['cod_rh'];
              $args['txtGenero'] = $data[0]['genero'];
              $args['txtEdad'] = $data[0]['edad'];
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
      $args['formAction'] = 'index.php?action=update&amp;id_apre=' . $_GET['id_apre'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['id_apre'] = $_POST['txtId_apre'];
      $data['nom_apre'] = $_POST['txtNom_apre'];
      $data['apel_apre'] = $_POST['txtApel_apre'];
      $data['tel_apre'] = $_POST['txtTel_apre'];
      $data['cod_ciudad'] = $_POST['txtCod_ciudad'];
      $data['cod_tipo_id'] = $_POST['txtCod_tipo_id'];
      $data['cod_rh'] = $_POST['txtCod_rh'];
      $data['genero'] = $_POST['txtGenero'];
      $data['edad'] = $_POST['txtEdad'];
      $rsp = modelClass::updateAprendiz($_GET['id_apre'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;id_apre=' . $_GET['id_apre'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;id_apre=' . $_GET['id_apre'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id_apre']) and is_numeric($_GET['id_apre'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteAprendiz($_GET['id_apre']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id_apre'] . ' fue eliminado exitosamente';
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