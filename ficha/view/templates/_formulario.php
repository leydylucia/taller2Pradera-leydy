<!-- 
este es el formulario de las tablas se maneja css
@var $num_ficha,$cod_prog,fecha_ini,fecha_fin,cod_centroson de tipo varchar
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
          <th >num_ficha</th>
          <th><input type="text" name="txtNum_ficha"value="<?php echo ((isset($txtNum_ficha)) ? $txtNum_ficha : '') ?>" id="txtNum_ficha" required min="1" max="20"></input></th>
		</tr>
		
		<tr>
          <th>cod_prog</th>
          <th><input type="text"name="txtCod_prog"value="<?php echo ((isset($txtCod_prog)) ? $txtCod_prog : '') ?>" id="txtCod_prog" required min="1" max="20"> </input> </th>
        </tr> 
		<tr>
          <th>fecha_ini</th>
        <th><input type="text"name="txtFecha_ini"value="<?php echo ((isset($txtFecha_ini)) ? $txtFecha_ini : '') ?>" id="txtFecha_ini" required min="1" max="20"></input></th>
       
	   </tr> 
		<tr>
          <th>fecha_fin</th>
          <th><input type="text"name="txtFecha_fin"value="<?php echo ((isset($txtFecha_fin)) ? $txtFecha_fin: '') ?>" id="txtFecha_fin" required min="1" max="20"></input></th>
        </tr> 
		<tr>
          <th> cod_centro</th>
          <th><input type="text"name="txtCod_centro"value="<?php echo ((isset($txtCod_centro)) ? $txtCod_centro : '') ?>" id="txtCod_centro" required min="1" max="20"></input>  </th>
        </tr> 
		
          
     
  
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>