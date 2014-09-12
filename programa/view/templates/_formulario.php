<!-- 
este es el formulario de las tablas se maneja css
*@VAR  $cod-prog,$des_prog,estado son de tipo string
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
          <th >cod_prog</th>
          <th><input type="text"name="txtCod_prog"value="<?php echo ((isset($txtCod_prog)) ? $txtCod_prog : '') ?>" id="txtCod_prog" required min="1" max="20"> </input></th>
		</tr>
		
		<tr>
          <th>des_prog</th>
          <th><input type="text"name="txtDes_prog"value="<?php echo ((isset($txtDes_prog)) ? $txtDes_prog : '') ?>" id="txtDes_prog" required min="1" max="20"> </input></th>
        </tr> 
		<tr>
          <th>estado</th>
          <th><input type="text"name="txtEstado"value="<?php echo ((isset($txtEstado)) ? $txtEstado : '') ?>" id="txtEstado" required min="1" max="20"> </input></input></th>
        </tr> 
		
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>