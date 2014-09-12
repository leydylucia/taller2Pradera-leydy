<?php

/**
 * Description of modelClass
 *@VAR  $cod_causa,$des_causa,estado_causa son de tipo string
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
  
  static public function getRow($cod_causa) {
    try {
      $sql = 'SELECT causa_desercion.cod_causa,causa_desercion.des_causa,causa_desercion.estado_causa FROM causa_desercion WHERE causa_desercion.cod_causa = ' . $cod_causa;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyCausa_desercion($cod_causa) {
    try {
      $sql = 'SELECT causa_desercion.cod_causa FROM causa_desercion WHERE causa_desercion.cod_causa = ' . $cod_causa;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateCausa_desercion($cod_causa, $data) {
    try {

      $sql = "UPDATE causa_desercion SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_causa = " . $cod_causa;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("causa_desercion no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteCausa_desercion($cod_causa) {
    try {

      $sql = "DELETE FROM causa_desercion WHERE cod_causa = " . $cod_causa;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("cod_causa causa_desercion no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT causa_desercion.cod_causa,des_causa,estado_causa FROM causa_desercion';
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

  
  static public function putNewCausa_desercion($cod_causa, $des_causa, $estado_causa) {
    try {
      $sql = "INSERT INTO causa_desercion (cod_causa,des_causa,estado_causa) VALUES ('$cod_causa','$des_causa', '$estado_causa')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("cod_causa causa_desercion $cod_causa está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}