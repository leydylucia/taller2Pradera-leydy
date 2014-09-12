
<?php

/**
@var id, es de tipo integer aotu incrementable
usuario_id,credencial_id, son de tipo integer
 * Description of controllerClass
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
/*@var usuario_id credencial_id  son tipo integer */
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rsp = modelClass::putNewusuario_credencial($_POST['txtUsuario_id'], $_POST['txtCredencial_id']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      $certificate = modelClass::certifyusuario_credencial($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['id']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtId'] = $data[0]['id'];
              $args['txtUsuario_id'] = $data[0]['usuario_id'];
			  $args['txtCredencial_id'] = $data[0]['credencial_id'];
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
      $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 
      $data['usuario_id'] = $_POST['txtUsuario_id'];
      $data['credencial_id'] = $_POST['txtCredencial_id'];
      $rsp = modelClass::updateusuario_credencial($_GET['id'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }


  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;id=' . $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteusuario_credencial($_GET['id']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
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