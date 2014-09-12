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
       <th><img src="objetos/credencial.gif"> </th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  
<div id="lnkNuevo">
      <td colspan=4 align=center><a href="index.php?action=create"><button type="submit">nuevo registro</button></a></td>
    </div>
    
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <table id="tblContenido" border=3 width='50%' bgcolor="#ccffcc">
      <thead>
        <tr>
          <th>id</th>
          <th>nombre</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['nombre'] ?></td>
			
			<!--@link aqui se encuentra las rutas que conectan con el conttroller-->
			<td><a href="index.php?action=update&amp;id=<?php echo $row['id'] ?>"><button type="submit">MODIFICAR</button></a> 
		    <a href="index.php?action=delete&amp;id=<?php echo $row['id'] ?>"><button type="submit">ELIMINAR</button></a></td>
            </tr>
			
			
			
			 
        <?php endforeach ?>
		
		
		
		<!--@ link vinculo que va al menu principal-->
		<a href="http://localhost/taller2Pradera-leydy/">vuelve al menu principal
      </tbody>
    </table>
  </body>
</html>