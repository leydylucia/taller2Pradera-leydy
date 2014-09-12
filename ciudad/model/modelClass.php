<?php

/**
 * Description of modelClass
 *@VAR  '$cod_ciudad','$nom_ciudad','$cod_depto','$habitantes' son de tipo string
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
  
  static public function getRow($cod_ciudad) {
    try {
      $sql = 'SELECT ciudad.cod_ciudad,ciudad.nom_ciudad,ciudad.cod_depto,ciudad.habitantes FROM ciudad WHERE ciudad.cod_ciudad = ' . $cod_ciudad;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyCiudad($cod_ciudad) {
    try {
      $sql = 'SELECT ciudad.cod_ciudad FROM ciudad WHERE ciudad.cod_ciudad = ' . $cod_ciudad;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
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
  static public function updateCiudad($cod_ciudad, $data) {
    try {

      $sql = "UPDATE ciudad SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_ciudad = " . $cod_ciudad;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("ciudad no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteCiudad($cod_ciudad) {
    try {

      $sql = "DELETE FROM ciudad WHERE cod_ciudad = " . $cod_ciudad;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El cod_ciudad ciudad no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT ciudad.cod_ciudad,nom_ciudad,cod_depto,habitantes FROM ciudad';
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
  static public function putNewCiudad($cod_ciudad, $nom_ciudad,$cod_depto,$habitantes) {
    try {
      $sql = "INSERT INTO ciudad (cod_ciudad,nom_ciudad,cod_depto,habitantes) VALUES ('$cod_ciudad','$nom_ciudad','$cod_depto','$habitantes')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El cod_ciudad ciudad $cod_ciudad está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}