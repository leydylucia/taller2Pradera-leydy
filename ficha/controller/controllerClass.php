
<?php

/**
 * Description of controllerClass
 @var $num_ficha,$cod_prog,fecha_ini,fecha_fin,cod_centroson de tipo varchar
 *@ACCES Public function index,
 *public function create insertar datos,
 *public function update modificar datos
 ,public function delete eliminar datos
 *@param metodo POST 
 *@VAR $args,
 * @author LEYDY LUCIA CASTILLO MOSQUERA TADSI 545715 PRADERA MAÑANA
 */
class controllerClass {

  public function index($args = NULL) {
    $args['datos'] = modelClass::getAll();

    if (is_array($args['datos'])) {//opcional if (is_array($args['datos'])=== true)
      viewClass::renderHTML('index.php', $args);//si se cambia el nombre al index del template  a read se cambia aqui tambien
    } else {
      viewClass::renderHTML('error.php', $args);//$args['error']=$data->getMessage();
    }
  }

 public function create() {
    $template = 'create.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtNum_ficha'])) {
        $rsp = modelClass::putNewFicha($_POST['txtNum_ficha'], $_POST['txtCod_prog'],$_POST['txtFecha_ini'],$_POST['txtFecha_fin'],$_POST['txtCod_centro']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_ficha']) and is_numeric($_GET['num_ficha'])) {
      $certificate = modelClass::certifyFicha($_GET['num_ficha']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['num_ficha']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtNum_ficha'] = $data[0]['num_ficha'];
              $args['txtCod_prog'] = $data[0]['cod_prog'];
              $args['txtFecha_ini'] = $data[0]['fecha_ini'];
              $args['txtFecha_fin'] = $data[0]['fecha_fin'];
              $args['txtCod_centro'] = $data[0]['cod_centro'];  
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
      $args['formAction'] = 'index.php?action=update&amp;num_ficha=' . $_GET['num_ficha'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['num_ficha'] = $_POST['txtNum_ficha'];
      $data['cod_prog'] = $_POST['txtCod_prog'];
      $data['fecha_ini'] = $_POST['txtFecha_ini'];
      $data['fecha_fin'] = $_POST['txtFecha_fin'];
      $data['cod_centro'] = $_POST['txtCod_centro'];
      $rsp = modelClass::updateFicha($_GET['num_ficha'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;num_ficha=' . $_GET['num_ficha'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;num_ficha=' . $_GET['num_ficha'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_ficha']) and is_numeric($_GET['num_ficha'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteFicha($_GET['num_ficha']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['num_ficha'] . ' fue eliminado exitosamente';
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