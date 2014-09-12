<!-- 
este es el formulario de las tablas se maneja css
@var COD_RH, DES_RH son de tipo varchar
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
       
  <section id="contenido"><center><!--parte del css-->
       <article><!--inicio de article-->
       <title>TABLAS BDDESERCION</title>
  </head>
  <body bgcolor=><center>
     <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->

	 
	 
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
 
  <div align="center">
    <table border="3" width="90"bgcolor="#ccffcc" ; >
     
		
		<tr>
          <th bgcolor="#ccffcc">cod_rh</th>
          <th><input type="text" name="txtCod_rh"value="<?php echo ((isset($txtCod_rh)) ? $txtCod_rh : '') ?>" id="txtCod_rh" required min="1" max="20"></input> </input></th>
		</tr>
		
		<tr>
         <th>des_rh</th>
          <th><input type="text"name="txtDes_rh"value="<?php echo ((isset($txtDes_rh)) ? $txtDes_rh : '') ?>" id="txtDes_rh" required min="1" max="20"> des_rh</input></th>
        </tr> 
		
    
      
        
       </div>
       </div>
     </div>
      <div>
       <a href="index.php">Volver</a>
      <button type="submit">enviar</button>
  </div>
</form>

</html>