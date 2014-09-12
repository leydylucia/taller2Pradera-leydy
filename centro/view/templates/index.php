<!-- 
este es el formulario de las tablas se maneja css
@var cod_centro, desc_centro,tel,dir son de tipo varchar 
@vercion 2
@autor leydy lucia castillo ficha 545715-->


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
       <th><img src="objetos/centro.gif"> </th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  
<td colspan=6 align=center><a href="index.php?action=create"><button type="submit">nuevo registro</button></a>-</td>
  
    
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <table id="tblContenido"  bgcolor=#ccffcc border=3 width="80%">
      <thead>
        <tr>
          <th>cod_centro</th>
          <th>desc_centro</th>
		  <th>tel</th>
		  <th>dir</th>
		  <th>cod_ciudad</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
              <td><?php echo $row['cod_centro'] ?></td>
              <td><?php echo $row['desc_centro'] ?></td>
			  <td><?php echo $row['tel'] ?></td>
              <td><?php echo $row['dir'] ?></td>
              <td><?php echo $row['cod_ciudad'] ?></td>
		   
		       <!--@link aqui se encuentra las rutas que conectan con el conttroller--> 
               <td> <a href="index.php?action=delete&amp;cod_centro=<?php echo $row['cod_centro'] ?>"><button type="submit">Eliminar</button></a>
                    <a href="index.php?action=update&amp;cod_centro=<?php echo $row['cod_centro'] ?>"><button type="submit">MODIFICAR</button></a> </td>
		  </tr>
        <?php endforeach ?>
		
		<!--@ link vinculo que va al menu principal-->
		<a href="http://localhost/taller2Pradera-leydy/">vuelve al menu principal
      </tbody>
    </table>
  </body>
</html>