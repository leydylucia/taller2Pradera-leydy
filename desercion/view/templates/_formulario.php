<!-- 
este es el formulario de las tablas se maneja css

  *@VAR  $id_apre,$nom_apre,aprel_apre,tel_apre
 *cod_ciudad,cod_tipo_id,cod_rh,genero,edad son de tipo string
 *
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
    <table border="3" width="90"bgcolor="#ccffcc" align=center;><!--color verde-->
      
	  	
		<tr>
          <th>num_doc</th>
          <th><input type="text" name="txtNum_doc"value="<?php echo ((isset($txtNum_doc)) ? $txtNum_doc : '') ?>" id="txtNum_doc" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>fecha</th>
          <th><input type="text"name="txtFecha"value="<?php echo ((isset($txtFecha)) ? $txtFecha : '') ?>" id="txtFecha" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>id_apre</th>
          <th><input type="text" name="txtId_apre"value="<?php echo ((isset($txtId_apre)) ? $txtId_apre : '') ?>" id="txtId_apre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>num_ficha</th>
          <th><input type="text"name="txtNum_ficha"value="<?php echo ((isset($txtNum_ficha)) ? $txtNum_ficha : '') ?>" id="txtNum_ficha" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th> cod_causa</th>
          <th><input type="text"name="txtCod_causa"value="<?php echo ((isset($txtCod_causa)) ? $txtCod_causa : '') ?>" id="txtCod_causa" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>fecha_desercion</th>
          <th><input type="text"name="txtFecha_desercion"value="<?php echo ((isset($txtFecha_desercion)) ? $txtFecha_desercion : '') ?>" id="txtFecha_desercion" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>fase_desercion</th>
          <th><input type="text"name="txtFase_desercion"value="<?php echo ((isset($txtFase_desercion)) ? $txtFase_desercion : '') ?>" id="txtFase_desercion" required min="1" max="20"></input></th>
        </tr> 
		
		
     
  
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>