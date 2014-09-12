<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    
    static public function getAll() {
        try {
            $sql = "select count(id_apre),desc_centro "
                 . "FROM desercion natural join ficha,centro "
                 . "where ficha.cod_centro=centro.cod_centro group by centro.cod_centro "; 
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
