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
       <th><h1>consulta 8</h1></th><!--es el titulo notificacion-->
      </header> 
	     <section id="contenido"><center><!--parte del css-->
         <article><!--inicio de article-->
    <title>TABLAS BDDESERCION</title>
  
        <!--if me permite la ejecucion condicional de fragmentos de codigo 
        en este caso para validar si es un error o si la operacion se ejecuto correctamente.-->
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error ?></div>
        <?php endif ?>

        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success ?></div>
        <?php endif ?>
        <table border=3>
            <thead>
			<a href="http://localhost/taller2Pradera-leydy/"><input type="button" value="Pagina Principal"></a>	
      <?php foreach ($datos as $row): ?>           
    
 
  <tr>
      <th>cantidad</th>
      <td><?php echo $row['count(id_apre)']?></td>
  </tr>
    <tr>
        <th>des_causa</th>
	    <td><?php echo $row['des_causa']?></td>
	</tr>
	  
	    <tr>
	        <th>desc_centro</th>
	        <td><?php echo $row['desc_centro']?></td>
        </tr>
	     

			 <?php endforeach ?>
           
                <!--foreach es un ciclo que uso para que recorra los registros de mi BD
                y los muestre en la variable $row-->
               
                 
               
           
        </table><br>
    </body>
</html>