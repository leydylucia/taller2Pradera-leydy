<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    
    static public function getAll() {
        try {
            $sql = "select nom_apre,des_causa,genero,desc_centro,des_tipo_id 
       FROM desercion natural join causa_desercion,aprendiz natural join tipo_id,centro natural join  ficha 
	   where aprendiz.id_apre=desercion.id_apre and desercion.num_ficha=ficha.num_ficha and genero='f' and cod_causa=1";
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
