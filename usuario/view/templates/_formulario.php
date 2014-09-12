<!--@VAR  $ID INT AOTU_INCREMENTABLE
 *@VAR $USUARIO,$PASSWORD, TIPO STRING
 @VAR $ACTIVADO TIPO BOOLEAN
 @AUTOR Leydy lucia castillo mosquera tadsi 545715-->
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
  <table border="3" width="90%"bgcolor="#ccffcc" align=center;><!--color verde-->
      
	  
	  
      <div class="floatLeft">
        <label for="txtUsuario">Usuario</label>
      </div>
      <div>
        <input type="text" value="<?php echo ((isset($txtUsuario)) ? $txtUsuario : '') ?>" id="txtUsuario" name="txtUsuario" required min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label for="txtPassword1">Contraseña</label>
      </div>
      <div>
        <input type="password" value="" id="txtPassword1" name="txtPassword1" <?php echo ($_GET['action'] === 'update') ? '' : 'required' ?> min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label for="txtPassword2">Repetir contraseña</label>
      </div>
      <div>
        <input type="password" value="" id="txtPassword2" name="txtPassword2" <?php echo ($_GET['action'] === 'update') ? '' : 'required' ?> min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label>Activado</label>
      </div>
      <div>
        <input type="radio" name="rdoActivado" id="rdoActivadoSi" value="true" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'true') ? 'checked' : '') : '') ?> required> Si
        <input type="radio" name="rdoActivado" id="rdoActivadoNo" value="false" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'false') ? 'checked' : '') : '') ?> required> No
      </div>
    </div>
  </div>
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">Registrar</button>
  </div>
</form>
</html>