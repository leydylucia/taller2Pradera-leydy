
<?php

/**
 * Description of controllerClass
 *@ACCES Public function index,
  *@VAR  $id_apre,$nom_apre,aprel_apre,tel_apre
 *cod_ciudad,cod_tipo_id,cod_rh,genero,edad son de tipo string
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtNum_doc'])) {
        $rsp = modelClass::putNewdesercion($_POST['txtNum_doc'], $_POST['txtFecha'],$_POST['txtId_apre'],$_POST['txtNum_ficha'],$_POST['txtCod_causa'],$_POST['txtFecha_desercion'],$_POST['txtFase_desercion']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_doc']) and is_numeric($_GET['num_doc'])) {
      $certificate = modelClass::certifydesercion($_GET['num_doc']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['num_doc']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtNum_doc'] = $data[0]['num_doc'];
              $args['txtFecha'] = $data[0]['fecha'];
              $args['txtId_apre'] = $data[0]['id_apre'];
              $args['txtNum_ficha'] = $data[0]['num_ficha'];
              $args['txtCod_causa'] = $data[0]['cod_causa'];
              $args['txtFecha_desercion'] = $data[0]['fecha_desercion'];
              $args['txtFase_desercion'] = $data[0]['fase_desercion'];
              
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
      $args['formAction'] = 'index.php?action=update&amp;num_doc=' . $_GET['num_doc'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['num_doc'] = $_POST['txtNum_doc'];
      $data['fecha'] = $_POST['txtFecha'];
      $data['id_apre'] = $_POST['txtId_apre'];
      $data['num_ficha'] = $_POST['txtNum_ficha'];
      $data['cod_causa'] = $_POST['txtCod_causa'];
      $data['fecha_desercion'] = $_POST['txtFecha_desercion'];
      $data['fase_desercion'] = $_POST['txtFase_desercion'];
     
      $rsp = modelClass::updatedesercion($_GET['num_doc'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;num_doc=' . $_GET['num_doc'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;num_doc=' . $_GET['num_doc'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_doc']) and is_numeric($_GET['num_doc'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deletedesercion($_GET['num_doc']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['num_doc'] . ' fue eliminado exitosamente';
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