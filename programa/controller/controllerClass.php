
<?php

/**
 * Description of controllerClass
 @VAR  $cod-prog,$des_prog,estado son de tipo string
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
	/*is_numeric hace la variable cod_prog en numerica*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtCod_prog'])) {
        $rsp = modelClass::putNewprograma($_POST['txtCod_prog'], $_POST['txtDes_prog'],$_POST['txtEstado']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_prog']) and is_numeric($_GET['cod_prog'])) {
      $certificate = modelClass::certifyprograma($_GET['cod_prog']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_prog']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtCod_prog'] = $data[0]['cod_prog'];
              $args['txtDes_prog'] = $data[0]['des_prog'];
              $args['txtEstado'] = $data[0]['estado'];
              
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
      $args['formAction'] = 'index.php?action=update&amp;cod_prog=' . $_GET['cod_prog'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['cod_prog'] = $_POST['txtCod_prog'];
      $data['des_prog'] = $_POST['txtDes_prog'];
      $data['estado'] = $_POST['txtEstado'];
     
      $rsp = modelClass::updateprograma($_GET['cod_prog'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_prog=' . $_GET['cod_prog'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }
 public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_prog=' . $_GET['cod_prog'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_prog']) and is_numeric($_GET['cod_prog'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteprograma($_GET['cod_prog']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['cod_prog'] . ' fue eliminado exitosamente';
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