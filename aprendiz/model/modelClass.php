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
  
  static public function getRow($id_apre) {
    try {
      $sql = 'SELECT aprendiz.id_apre,aprendiz.nom_apre,aprendiz.apel_apre,aprendiz.tel_apre,aprendiz.cod_ciudad,aprendiz.cod_tipo_id,aprendiz.cod_rh,aprendiz.genero,aprendiz.edad FROM aprendiz WHERE aprendiz.id_apre = ' . $id_apre;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyAprendiz($id_apre) {
    try {
      $sql = 'SELECT aprendiz.id_apre FROM aprendiz WHERE aprendiz.id_apre = ' . $id_apre;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información del usuario
   * @param integer $id Variables contenedora del ID del aprendiz
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateAprendiz($id_apre, $data) {
    try {

      $sql = "UPDATE aprendiz SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id_apre = " . $id_apre;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El Aprendiz no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteAprendiz($id_apre) {
    try {

      $sql = "DELETE FROM aprendiz WHERE id_apre = " . $id_apre;

      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El ID Aprendiz no ha podido ser eliminado", 2633);
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
      $sql = 'SELECT aprendiz.id_apre,nom_apre,apel_apre,tel_apre,cod_ciudad,cod_tipo_id,cod_rh,genero,edad FROM aprendiz';
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
  static public function putNewAprendiz($id_apre, $nom_apre,$apel_apre,$tel_apre,$cod_ciudad,$cod_tipo_id,$cod_rh,$genero,$edad) {
    try {
      $sql = "INSERT INTO aprendiz (id_apre,nom_apre,apel_apre,tel_apre,cod_ciudad,cod_tipo_id,cod_rh,genero,edad) VALUES ('$id_apre','$nom_apre','$apel_apre','$tel_apre','$cod_ciudad','$cod_tipo_id','$cod_rh','$genero','$edad')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El ID Aprendiz $id_apre está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}