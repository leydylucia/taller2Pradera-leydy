<!-- 
este es el formulario de las tablas se maneja css
@var cod_centro, desc_centro,tel,dir son de tipo varchar
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
  <form action="insertarRh.php"name="consultar" method="post" id="calc">
  <div align="center">
    <table border="3" width="90"bgcolor="#ccffcc" align=center;><!--color verde-->
       
	  <tr >
          <th >cod_centro</th>
          <th> <input type="text" name="txtCod_centro"value="<?php echo ((isset($txtCod_centro)) ? $txtCod_centro : '') ?>" id="txtCod_centro" required min="1" max="20"></input></th>
		</tr>
		
		<tr>
          <th>desc_centro</th>
          <th><input type="text"name="txtDesc_centro"value="<?php echo ((isset($txtDesc_centro)) ? $txtDesc_centro : '') ?>" id="txtDesc_centro" required min="1" max="20"></input></th>
        </tr> 
		<tr>
          <th>telefono</th>
          <th><input type="text"name="txtTel"value="<?php echo ((isset($txtTel)) ? $txtTel : '') ?>" id="txtTel" required min="1" max="20"></input></th>
        </tr> 
		<tr>
          <th> direccion</th>
          <th><input type="text"name="txtDir"value="<?php echo ((isset($txtDir)) ? $txtDir : '') ?>" id="txtDir" required min="1" max="20"></input></th>
        </tr> 
		<tr>
          <th> ciudad</th>
          <th><input type="text"name="txtCod_ciudad"value="<?php echo ((isset($txtCod_ciudad)) ? $txtCod_ciudad : '') ?>" id="txtCod_ciudad" required min="1" max="20"></input></th>
        </tr> 
		
          
     
  
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>