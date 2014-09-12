<?php

/**
 * Description of modelClass
 *@VAR  $id_apre,$nom_apre,aprel_apre,tel_apre
 *cod_ciudad,cod_tipo_id,cod_rh,genero,edad son de tipo string
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
  
  static public function getRow($num_doc) {
    try {
      $sql =  " SELECT  desercion.num_doc,fecha,aprendiz.id_apre,ficha.num_ficha,causa_desercion.cod_causa,fecha_desercion,fase_desercion "
	  . " FROM desercion,aprendiz,ficha,causa_desercion " 
	  . " WHERE desercion.num_doc = '$num_doc ' "
	  . " and desercion.num_ficha=ficha.num_ficha "
	  . " and desercion.id_apre=aprendiz.id_apre "
      . " and desercion.cod_causa=causa_desercion.cod_causa ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifydesercion($num_doc) {
    try {
      $sql = "SELECT desercion.num_doc FROM desercion WHERE desercion.num_doc = '$num_doc' ";
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
  static public function updatedesercion($num_doc, $data) {
    try {

      $sql = "UPDATE desercion SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_doc = " . $num_doc;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("desercion no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deletedesercion($num_doc) {
    try {

      $sql = "DELETE FROM desercion WHERE num_doc = " . $num_doc;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("num_doc desercion no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT desercion.num_doc,fecha,id_apre,num_ficha,cod_causa,fecha_desercion,fase_desercion FROM desercion';
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
  static public function putNewdesercion($num_doc,$fecha,$id_apre,$num_ficha,$cod_causa,$fecha_desercion,$fase_desercion) {
    try {
      $sql = "INSERT INTO  desercion (num_doc,fecha,id_apre,num_ficha,cod_causa,fecha_desercion,fase_desercion) VALUES ('$num_doc','$fecha','$id_apre','$num_ficha','$cod_causa','$fecha_desercion','$fase_desercion')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("num_doc desercion $num_doc está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}