<?php

/**
 * Description of modelClass
 *
 * @author Bayron esteban henao
 */
class modelClass {

    
    static public function getAll() {
        try {
            $sql = "select nom_apre,des_causa,genero,nom_ciudad,des_prog,des_rh 
FROM desercion natural join causa_desercion,aprendiz natural join ciudad,programa natural join  ficha,rh
where aprendiz.id_apre=desercion.id_apre and desercion.num_ficha=ficha.num_ficha and aprendiz.cod_rh=rh.cod_rh 
and genero='m' and cod_causa=3";
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
