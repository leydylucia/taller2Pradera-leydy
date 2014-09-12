<!-- 
este es el formulario de las tablas se maneja css
@var cod_ciudad, nom_ciudad,cod_depto,habitantes son de tipo varchar
@vercion 2
@autor leydy lucia castillo ficha 545715-->

<html lang="es" >
   <head>
      <meta charset="iso-8859-1">
      <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
      <title>consulta </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
 </head>
  <body>
   <div id="baseglobal"><!--parte del css-->
     
       </header> 
  <section id="contenido"><center><!--parte del css-->
       <article><!--inicio de article-->
       <title>TABLAS BDDESERCION</title>
  </head>
  <body bgcolor=><center>
     <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->


  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div align="center">
    <table border="3" width="90" bgcolor=#ccffcc;>
      <tr> 
          <th> cod_ciudad</th>
          <th><input type="text" name="txtCod_ciudad"value="<?php echo ((isset($txtCod_ciudad)) ? $txtCod_ciudad : '') ?>" id="txtCod_ciudad" required min="1" max="20"> </input></th>
      </tr>
	  
       <tr> 		
		  <th> nom_ciudad </th>
		 <th> <input type="text"name="txtNom_ciudad"value="<?php echo ((isset($txtNom_ciudad)) ? $txtNom_ciudad : '') ?>" id="txtNom_ciudad" required min="1" max="20"> </input></th>
       </tr> 
	   
	   <tr>
		  <th> cod_depto </th>
		  <th>  <input type="text"name="txtCod_depto"value="<?php echo ((isset($txtCod_depto)) ? $txtCod_depto : '') ?>" id="txtCod_depto" required min="1" max="20"> </input></th>
       </tr>

        <tr>	   
		   <th>habitantes</th> 
		   <th> <input type="text"name="txtHabitantes"value="<?php echo ((isset($txtHabitantes)) ? $txtHabitantes : '') ?>" id="txtHabitantes" required min="1" max="20"> </input></th>        
        </tr>
		
		</select></th>
      </tr>
      <tr>
        <th colspan=2><input type="submit" value="enviar"/></th>
      </tr>
      </div>
    </div>
  </div>
  <div>
    <a href="index.php">Volver</a>
  </div>
</form>