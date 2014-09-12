<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    
    static public function getAll() {
        try {
            $sql =  "select nom_apre,des_tipo_id,nom_ciudad,nom_depto,desc_centro
       FROM desercion,aprendiz,tipo_id,ficha natural join centro natural join ciudad natural join depto
       where desercion.id_apre=aprendiz.id_apre and tipo_id.cod_tipo_id=aprendiz.cod_tipo_id and ficha.num_ficha=desercion.num_ficha" ;
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
