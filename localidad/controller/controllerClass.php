
<?php

/**
@var  $id, tipo integer auto increment
 *$nombre',son de tipo string
 *'$localidad' tipo integer
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['txtHija']) {
       
        $rsp = modelClass::putNewlocalidad($_POST['txtHija'], $_POST['txtPapa']);/*txthija hace referencia a nombre y txtpapa hace referencia a localidad*/
        if ($rsp === true) {
          $args['success'] = 'El registro fue realizado exitosamente';
          $this->index($args);
        } else { 
          $args['error'] = $rsp->getMessage();
          $args['formAction'] = 'index.php?action=create';
          $args = array_merge($args, $_POST);
          viewClass::renderHTML($template, $args);
        }
      } else {
        $args['error'] = 'el codigo es iguales';
        $args['formAction'] = 'index.php?action=create';
        $args = array_merge($args, $_POST);
        viewClass::renderHTML($template, $args);
      }
    } else {
      $args['formAction'] = 'index.php?action=create';
      viewClass::renderHTML($template, $args);
    }
  }

  public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id'])) {
      $certificate = modelClass::certifylocalidad($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['id']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtId'] = $data[0]['id'];
              $args['txtHija'] = $data[0]['hija'];/*este campo en la bd corresponde a nombre*/
			  $args['txtPapa'] = $data[0]['papa'];/*este campo corresponde a localidad*/
			 
             
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
  
      
    
      $data['nombre'] = ($_POST['nombre'] );
	  $data['localidad'] = ($_POST['localidad'] );
	  
      $rsp = modelClass::updatelocalidad($_GET['id'], $data);
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
      $rsp = modelClass::deletelocalidad($_GET['id']);
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