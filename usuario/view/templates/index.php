<!--@VAR  $ID INT AOTU_INCREMENTABLE
 *@VAR $USUARIO,$PASSWORD, TIPO STRING
 @VAR $ACTIVADO TIPO BOOLEAN
 @AUTOR Leydy lucia castillo mosquera tadsi 545715-->
<!DOCTYPE html>
<html lang="es" >
      <head>
         <meta charset="iso-8859-1">
         <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
          <title>consulta </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
       </head>
    <body>
       <div id="baseglobal"><!--parte del css-->
       <header id="Encabezados">
       <th><img src="objetos/usuario.gif"> </th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  
    
    <div id="lnkNuevo">
      <a href="index.php?action=create"><button type="submit">Nuevo registro</button></a>
    </div>
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
     <table border="3" width="90%"bgcolor="#ccffcc" align=center><!--color verde-->
      
	  
      <thead>
        <tr>
		  <th>id</th>
          <th>Nombre</th>
          <th>Activado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
		    <td><?php echo $row['id'] ?></td> 
            <td><?php echo $row['usuario'] ?></td>
            <td><?php echo $row['activado'] ?></td>
            <td><a href="index.php?action=update&amp;id=<?php echo $row['id'] ?>"><button type="submit">Modificar</button></a> 
			- <a href="index.php?action=delete&amp;id=<?php echo $row['id'] ?>"><button type="submit">Eliminar</button></a></td>
          </tr>
        <?php endforeach ?>
		
		<!--@ link vinculo que va al menu principal-->
		<a href="http://localhost/taller2Pradera-leydy/">vuelve al menu principal
      </tbody>
    </table>
  </body>
</html>