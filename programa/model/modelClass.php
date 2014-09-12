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
  
  static public function getRow($cod_prog) {
    try {
      $sql = 'SELECT cod_prog,des_prog,estado FROM programa WHERE programa.cod_prog = ' . $cod_prog;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyprograma($cod_prog) {
    try {
      $sql = 'SELECT cod_prog FROM programa WHERE programa.cod_prog = ' . $cod_prog;
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
  static public function updateprograma($cod_prog, $data) {
    try {

      $sql = "UPDATE programa SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_prog = " . $cod_prog;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("el programa no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteprograma($cod_prog) {
    try {

      $sql = "delete from programa where cod_prog='$cod_prog'"; 

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("el programa no ha podido ser eliminado", 2633);
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
      $sql = " select cod_prog,des_prog,estado from programa " ;
	   
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
  static public function putNewprograma($cod_prog, $des_prog,$estado) {
    try {
      $sql ="INSERT INTO programa(cod_prog,des_prog,estado) VALUES ('$cod_prog','$des_prog','$estado') ";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El programa $cod_prog está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}