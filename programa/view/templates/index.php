<!-- 
este es el formulario de las tablas se maneja css
@var cod_prog, des_prog,estado, son de tipo string son de tipo varchar
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
       <th><img src="objetos/programa.gif"> </th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  <td colspan=2 align=center><a href="index.php?action=create"><button type="submit">nuevo registro</button></a>
		

    
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <table id="tblContenido" border=3 width='80%' bgcolor="#ccffcc">
      <thead>
        <tr>
          <th>cod_prog</th>
          <th>des_prog</th>
		  <th>estado</th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
         <tr>
            <td><?php echo $row['cod_prog'] ?></td>
            <td><?php echo $row['des_prog'] ?></td>
			<td><?php echo $row['estado'] ?></td>
			
			<!--@link aqui se encuentra las rutas que conectan con el conttroller-->
			<td><a href="index.php?action=delete&amp;cod_prog=<?php echo $row['cod_prog'] ?>"><button type="submit">ELIMINAR</button></a>
            -<a href="index.php?action=update&amp;cod_prog=<?php echo $row['cod_prog'] ?>"><button type="submit">MODIFICAR</button></a> </td>
		</tr>
			 
        <?php endforeach ?>
		
		
		
		
		
		<!--@ link vinculo que va al menu principal-->
		<a href="http://localhost/taller2Pradera-leydy/">vuelve al menu principal
      </tbody>
    </table>
  </body>
</html>