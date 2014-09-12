<!-- 
este es el formulario de las tablas se maneja css
@var  $id, tipo integer auto increment
 *$nombre',son de tipo string
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
    <table border="3" width="90"bgcolor="#ccffcc" ; >
     
		
		
		<tr>
         <th>nombre</th>
          <th><input type="text" name="txtNombre"value="<?php echo ((isset($txtNombre)) ? $txtNombre : '') ?>" id="txtNombre" required min="1" max="20"></input></th>
        </tr> 
		
    
      
        
       </div>
       </div>
     </div>
      <div>
       <a href="index.php">Volver</a>
      <button type="submit">Registrar</button>
  </div>
</form>

</html>