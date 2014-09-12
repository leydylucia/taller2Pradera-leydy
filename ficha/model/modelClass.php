<?php

/**
 * Description of modelClass
 *@VAR  $num_ficha,$cod_prog,fecha_ini,fecha_fin,cod_centro son de tipo string
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
  
  static public function getRow($num_ficha) {
    try {
      $sql = 'SELECT ficha.num_ficha,ficha.cod_prog,ficha.fecha_ini,ficha.fecha_fin,
      ficha.cod_centro FROM ficha WHERE ficha.num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyFicha($num_ficha) {
    try {
      $sql = 'SELECT ficha.num_ficha FROM ficha WHERE ficha.num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información del usuario
   * @param integer $id Variables contenedora del ID del usuario
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateFicha($num_ficha, $data) {
    try {

      $sql = "UPDATE ficha SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_ficha = " . $num_ficha;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("ficha no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteFicha($num_ficha) {
    try {

      $sql = "DELETE FROM ficha WHERE num_ficha = " . $num_ficha;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El num_ficha no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT ficha.num_ficha,cod_prog,fecha_ini,fecha_fin,cod_centro FROM ficha';
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
   * @param type $user
   * @param type $password
   * @param type $activate
   * @return \PDOException
   */
  static public function putNewFicha($num_ficha, $cod_prog,$fecha_ini,$fecha_fin,$cod_centro) {
    try {
      $sql = "INSERT INTO ficha (num_ficha,cod_prog,fecha_ini,fecha_fin,cod_centro) VALUES ('$num_ficha','$cod_prog','$fecha_ini','$fecha_fin','$cod_centro')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("num_ficha $num_ficha está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}