
<?php

/**
 * Description of controllerClass
 @var  $cod_causa,$des_causa,estado_causa son de tipo string
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtCod_causa'])) {
        $rsp = modelClass::putNewCausa_desercion($_POST['txtCod_causa'], $_POST['txtDes_causa'],$_POST['txtEstado_causa']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_causa']) and is_numeric($_GET['cod_causa'])) {
      $certificate = modelClass::certifyCausa_desercion($_GET['cod_causa']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_causa']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtCod_causa'] = $data[0]['cod_causa'];
              $args['txtDes_causa'] = $data[0]['des_causa'];
              $args['txtEstado_causa'] = $data[0]['estado_causa'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_causa=' . $_GET['cod_causa'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['cod_causa'] = $_POST['txtCod_causa'];
      $data['des_causa'] = $_POST['txtDes_causa'];
      $data['estado_causa'] = $_POST['txtEstado_causa'];
      
      $rsp = modelClass::updateCausa_desercion($_GET['cod_causa'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_causa=' . $_GET['cod_causa'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_causa=' . $_GET['cod_causa'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_causa']) and is_numeric($_GET['cod_causa'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteCausa_desercion($_GET['cod_causa']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['cod_causa'] . ' fue eliminado exitosamente';
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