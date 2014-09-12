<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    
    static public function getAll() {
        try {
            $sql = "select count(id_apre),des_causa,desc_centro
               FROM desercion natural join causa_desercion,centro natural join ficha
               where ficha.num_ficha=desercion.num_ficha and cod_centro=2 group by des_causa";
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
