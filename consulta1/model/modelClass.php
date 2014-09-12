<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    /**
     * en esta clase se ejecuta funcion estatica.
     * @param type $cod_rh
     * @return \PDOException
     */
    

    /**
     * 
     * @return \PDOException
     */
    static public function getAll() {
        try {
            $sql = "SELECT count(id_apre), fase_desercion FROM desercion group by fase_desercion"; 
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
}
