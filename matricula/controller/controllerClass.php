
<?php

/**
 * Description of controllerClass
 @var $num_ficha','$id_apre','$estado' son de tipo varchar
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
	/*is_numeric hace la variable num_ficha en numerica*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_numeric($_POST['txtNum_ficha'])) {
        $rsp = modelClass::putNewmatricula($_POST['txtNum_ficha'], $_POST['txtId_apre'],$_POST['txtEstado']);
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
      $certificate = modelClass::certifymatricula($_GET['num_ficha']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['num_ficha']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtNum_ficha'] = $data[0]['num_ficha'];
              $args['txtId_apre'] = $data[0]['id_apre'];
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
      $args['formAction'] = 'index.php?action=update&amp;num_ficha=' . $_GET['num_ficha'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['num_ficha'] = $_POST['txtNum_ficha'];
      $data['id_apre'] = $_POST['txtId_apre'];
      $data['estado'] = $_POST['txtEstado'];
     
      $rsp = modelClass::updatematricula($_GET['num_ficha'], $data);
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
    $args['formAction'] = 'index.php?action=delete&amp;id_apre=' . $_GET['id_apre'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id_apre']) and is_numeric($_GET['id_apre'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deletematricula($_GET['id_apre']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id_apre'] . ' fue eliminado exitosamente';
      $this->index($args);
	  } else {
        $args['error'] = $rsp;
        viewClass::renderHTML('error.php', $args);
      }
    }
  }

  public function notFound() {
    
  }

}