<?php

/**
 * Description of modelClass

*@VAR  usuario_id,localidad_id es de tipo integer ,
@var nombre,apellido,direccion,telefono
son de tipo string
 *
@vercion 2
@autor leydy lucia castillo ficha 545715-->
 *
 *@ACCES static public funtion get row,
 * "     static public function certifity certifica el dato de la tabla
 * "     static public function update,metodos sql para modificar
 * "     static public functin delete metodos sql para eliminar
 * "     static public function putNew metodos sql para insertar
 *
 * @author LEYDY LUCIA CASTILLO MOSQUERA TADSI 545715 PRADERA MAÑANA
 */
class modelClass {
  
  static public function getRow($id) {
    try {
      $sql =  " SELECT  datos_usuario.id,usuario_id,datos_usuario.nombre,apellido,direccion,telefono,localidad_id "
	  . " FROM datos_usuario,usuario,localidad " 
	  . " WHERE datos_usuario.id = '$id ' "
	  . " and datos_usuario.usuario_id=usuario.id "
	  . " and datos_usuario.localidad_id=localidad.id " ;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifydatos_usuario($id) {
    try {
      $sql = "SELECT datos_usuario.id FROM datos_usuario WHERE datos_usuario.id = '$id' ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * 
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updatedatos_usuario($id, $data) {
    try {

      $sql = "UPDATE datos_usuario SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id = " . $id;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("datos_usuario no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deletedatos_usuario($id) {
    try {

      $sql = "DELETE FROM datos_usuario WHERE id = " . $id;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("id datos_usuario no ha podido ser eliminado", 2633);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  /**
   * 
   * @return \PDOException
   */
  static public function getAll() {
    try {
      $sql = 'SELECT datos_usuario.id,usuario_id,nombre,apellido,direccion,telefono,localidad_id FROM datos_usuario';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC); //devuelve al consulta de mysql
    } catch (PDOException $e) {
      return $e;
      /*
        if($e->getCode() === 10) {
        echo 'Base de Datos no encotrada';
        }
       */
    }
  }

  /**
   *
   * @return \PDOException
   */
  static public function putNewdatos_usuario($usuario_id,$nombre,$apellido,$direccion,$telefono,$localidad_id) {
    try {
      $sql = "INSERT INTO  datos_usuario (usuario_id,nombre,apellido,direccion,telefono,localidad_id) VALUES ('$usuario_id','$nombre','$apellido','$direccion','$telefono','$localidad_id')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("id datos_usuario $usuario_id está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}