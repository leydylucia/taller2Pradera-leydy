
<?php

/**
 * Description of controllerClass
*@VAR  usuario_id,localidad_id es de tipo integer ,
@var nombre,apellido,direccion,telefono
son de tipo string
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rsp = modelClass::putNewdatos_usuario($_POST['txtUsuario_id'],$_POST['txtNombre'],$_POST['txtApellido'],$_POST['txtDireccion'],$_POST['txtTelefono'],$_POST['txtLocalidad_id']);
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
      $certificate = modelClass::certifydatos_usuario($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['id']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtId'] = $data[0]['id'];
              $args['txtUsuario_id'] = $data[0]['usuario_id'];
              $args['txtNombre'] = $data[0]['nombre'];
              $args['txtApellido'] = $data[0]['apellido'];
              $args['txtDireccion'] = $data[0]['direccion'];
              $args['txtTelefono'] = $data[0]['telefono'];
              $args['txtLocalidad_id'] = $data[0]['localidad_id'];
              
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
      $data['nombre'] = $_POST['txtNombre'];
      $data['apellido'] = $_POST['txtApellido'];
      $data['direccion'] = $_POST['txtDireccion'];
      $data['telefono'] = $_POST['txtTelefono'];
      $data['localidad_id'] = $_POST['txtLocalidad_id'];
   
     
      $rsp = modelClass::updatedatos_usuario($_GET['id'], $data);
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
      $rsp = modelClass::deletedatos_usuario($_GET['id']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
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