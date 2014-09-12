<!-- 
este es el formulario de las tablas se maneja css
*@VAR  usuario_id,localidad_id es de tipo integer ,
@var nombre,apellido,direccion,telefono
son de tipo string
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
          <th>usuario_id</th>
          <th><input type="text"name="txtUsuario_id"value="<?php echo ((isset($txtUsuario_id)) ? $txtUsuario_id : '') ?>" id="txtUsuario_id" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>nombre</th>
          <th><input type="text"name="txtNombre"value="<?php echo ((isset($txtNombre)) ? $txtNombre : '') ?>" id="txtNombre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>apellido</th>
          <th><input type="text" name="txtApellido"value="<?php echo ((isset($txtApellido)) ? $txtApellido : '') ?>" id="txtApellido" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>direccion</th>
          <th><input type="text"name="txtDireccion"value="<?php echo ((isset($txtDireccion)) ? $txtDireccion : '') ?>" id="txtDireccion" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>telefono</th>
          <th><input type="text"name="txtTelefono"value="<?php echo ((isset($txtTelefono)) ? $txtTelefono : '') ?>" id="txtTelefono" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>localidad_id</th>
          <th><input type="text"name="txtLocalidad_id"value="<?php echo ((isset($txtLocalidad_id)) ? $txtLocalidad_id : '') ?>" id="txtLocalidad_id" required min="1" max="20"></input></th>
        </tr> 
		
		
		
		
     
  
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>