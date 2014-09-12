<!-- 
este es el formulario de las tablas se maneja css
*@VAR  $id_apre,$nom_apre,aprel_apre,tel_apre
 *@var cod_ciudad,cod_tipo_id,cod_rh,genero,edad son de tipo string
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
          <th>id_apre</th>
          <th><input type="text" name="txtId_apre"value="<?php echo ((isset($txtId_apre)) ? $txtId_apre : '') ?>" id="txtId_apre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>nom_apre</th>
          <th><input type="text"name="txtNom_apre"value="<?php echo ((isset($txtNom_apre)) ? $txtNom_apre : '') ?>" id="txtNom_apre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>apel_apre</th>
          <th><input type="text"name="txtApel_apre"value="<?php echo ((isset($txtApel_apre)) ? $txtApel_apre : '') ?>" id="txtApel_apre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th> tel_apre</th>
          <th><input type="text"name="txtTel_apre"value="<?php echo ((isset($txtTel_apre)) ? $txtTel_apre : '') ?>" id="txtTel_apre" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th> cod_ciudad</th>
          <th><input type="text"name="txtCod_ciudad"value="<?php echo ((isset($txtCod_ciudad)) ? $txtCod_ciudad : '') ?>" id="txtCod_ciudad" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th> cod_tipo_id</th>
          <th><input type="text"name="txtCod_tipo_id"value="<?php echo ((isset($txtCod_tipo_id)) ? $txtCod_tipo_id : '') ?>" id="txtCod_tipo_id" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th>cod_rh</th>
          <th><input type="text"name="txtCod_rh"value="<?php echo ((isset($txtCod_rh)) ? $txtCod_rh : '') ?>" id="txtCod_rh" required min="1" max="20"></input></th>
        </tr> 
		
		<tr>
          <th> genero</th>
          <th><input type="text"name="txtGenero"value="<?php echo ((isset($txtGenero)) ? $txtGenero : '') ?>" id="txtGenero" required min="1" max="20"></input></th>
        </tr> 
		
         <tr >
          <th >edad</th>
          <th><input type="text"name="txtEdad"value="<?php echo ((isset($txtEdad)) ? $txtEdad : '') ?>" id="txtEdad" required min="1" max="20"></div></th>
		</tr>  
     
  
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">enviar</button>
  </div>
</form>