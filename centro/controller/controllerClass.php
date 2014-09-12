
<?php

/**
 * Description of controllerClass
 @var cod_centro, desc_centro,tel,dir son de tipo varchar
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
	/*IS_NUMERIC hace que la variable cod_centro se numerica*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtCod_centro'])) {
        $rsp = modelClass::putNewCentro($_POST['txtCod_centro'], $_POST['txtDesc_centro'],$_POST['txtTel'],$_POST['txtDir'],$_POST['txtCod_ciudad']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_centro']) and is_numeric($_GET['cod_centro'])) {
      $certificate = modelClass::certifyCentro($_GET['cod_centro']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_centro']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtCod_centro'] = $data[0]['cod_centro'];
              $args['txtDesc_centro'] = $data[0]['desc_centro'];
              $args['txtTel'] = $data[0]['tel'];
              $args['txtDir'] = $data[0]['dir'];
              $args['txtCod_ciudad'] = $data[0]['cod_ciudad'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_centro=' . $_GET['cod_centro'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['cod_centro'] = $_POST['txtCod_centro'];
      $data['desc_centro'] = $_POST['txtDesc_centro'];
      $data['tel'] = $_POST['txtTel'];
      $data['dir'] = $_POST['txtDir'];
      $data['cod_ciudad'] = $_POST['txtCod_ciudad'];
      $rsp = modelClass::updateCentro($_GET['cod_centro'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_centro=' . $_GET['cod_centro'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_centro=' . $_GET['cod_centro'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_centro']) and is_numeric($_GET['cod_centro'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteCentro($_GET['cod_centro']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['cod_centro'] . ' fue eliminado exitosamente';
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