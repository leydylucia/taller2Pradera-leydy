<?php

/**
 * Description of modelClass
 *@VAR  $num_ficha','$id_apre','$estado' son de tipo string
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
      $sql = "SELECT num_ficha,aprendiz.id_apre,estado FROM matricula,aprendiz WHERE matricula.num_ficha = '$num_ficha' and aprendiz.id_apre=matricula.id_apre ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifymatricula($num_ficha) {
    try {
      $sql = 'SELECT num_ficha FROM matricula WHERE matricula.num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información matriucla
  
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updatematricula($num_ficha, $data) {
    try {

      $sql = "UPDATE matricula SET ";

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
        throw new PDOException("la matricula no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deletematricula($id_apre) {
    try {

      $sql = "delete from matricula where id_apre='$id_apre'"; 

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("la matricula no ha podido ser eliminado", 2633);
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
      $sql = " select num_ficha,id_apre,estado from matricula " ;
	   
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
  static public function putNewmatricula($num_ficha, $id_apre,$estado) {
    try {
      $sql ="INSERT INTO matricula(num_ficha,id_apre,estado) VALUES ('$num_ficha','$id_apre','$estado') ";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("la matricula $num_ficha está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}