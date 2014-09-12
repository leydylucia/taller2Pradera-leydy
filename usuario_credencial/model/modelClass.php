<?php

/**
 * Description of modelClass
 *@VAR  $cod-prog,$des_prog,estado son de tipo string
 *
 *@ACCES static public funtion get row,
 * "     static public function certifity certifica el dato de la tabla
 * "     static public function updaterh,metodos sql para modificar
 * "     static public functin deleterh metodos sql para eliminar
 * "     static public function putNewrh metodos sql para insertar
 *
 * @author LEYDY LUCIA CASTILLO MOSQUERA TADSI 545715 PRADERA MAÑANA
 */
class modelClass {
  
  static public function getRow($id) {
    try {
	/*SE PONE USUARIO.ID Y CREDENCIAL.ID POR QUE ASI SE ENCUENTRA EN LA FORANEAS*/
      $sql = "SELECT usuario_credencial.id,usuario_id,credencial_id FROM usuario_credencial,usuario,credencial "
	        . "where usuario_credencial.id= '$id' "
			. "and usuario_credencial.usuario_id=usuario.id   " 
			. "and usuario_credencial.credencial_id=credencial.id  " ;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyusuario_credencial($id) {
    try {
      $sql = "SELECT usuario_credencial.id FROM usuario_credencial WHERE usuario_credencial.id = '$id' ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**

   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateusuario_credencial($id, $data) {
    try {

      $sql = "UPDATE usuario_credencial SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id = " . $id;
	  
	  echo $sql;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("el usuario_credencial no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteusuario_credencial($id) {
    try {

      $sql = "delete from usuario_credencial where id=" . $id ; 

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("la localidad no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT usuario_credencial.id,usuario_id,credencial_id FROM usuario_credencial,usuario,credencial where usuario_credencial.usuario_id=usuario.id and usuario_credencial.credencial_id=credencial.id ' ;
	   
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
   * @return \PDOException
   */
  static public function putNewusuario_credencial( $usuario_id,$credencial_id) {
    try {
      $sql ="INSERT INTO usuario_credencial(usuario_id,credencial_id) VALUES ('$usuario_id','$credencial_id') ";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("usuario_crendecial $usuario_id está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}