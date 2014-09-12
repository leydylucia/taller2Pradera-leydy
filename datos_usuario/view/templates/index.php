<!-- 
este es el formulario de las tablas se maneja css
*@VAR  usuario_id,localidad_id es de tipo integer ,
@var nombre,apellido,direccion,telefono
son de tipo string
 *
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
       <th><img src="objetos/datos usuario.gif"> </th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  

  
    <div id="lnkNuevo">
     <a href="index.php?action=create"><button type="submit">nuevo registro</button></a>
    </div>
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <table id="tblContenido"  bgcolor=#ccffcc border=3>
      <thead>
        <tr>
          <th>id</th>
          <th>usuario_id</th>
		  <th>nombre</th>
		  <th>apellido</th>
		  <th>direccion</th>
		  <th>telefono</th>
		  <th>localidad_id</th>
		  
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['usuario_id'] ?></td>
			<td><?php echo $row['nombre'] ?></td>
           <td><?php echo $row['apellido'] ?></td>
		   <td><?php echo $row['direccion'] ?></td>
           <td><?php echo $row['telefono'] ?></td>
           <td><?php echo $row['localidad_id'] ?></td>
           
		  
           
		  <!--@link aqui se encuentra las rutas que conectan con el conttroller--> 
         <td><a href="index.php?action=update&amp;id=<?php echo $row['id'] ?>"><button type="submit">Modificar</button></a> - 
		 <a href="index.php?action=delete&amp;id=<?php echo $row['id'] ?>"><button type="submit">Eliminar</button></a></td>
          </tr>
        <?php endforeach ?>
		
		<!--@ link vinculo que va al menu principal-->
		<a href="http://localhost/taller2Pradera-leydy/">vuelve al menu principal
      </tbody>
    </table>
  </body>
</html>