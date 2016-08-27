<?php
  $img_dir = "Views/template/imagenes/avatars".DS;
  $imagen = "";
  $imagen = $img_dir.$datos["imagen"];
  if (!is_readable($imagen))
  {
    $imagen = $img_dir."no-image.png";
   
  }
  $imagen = URL.$imagen;
?>
<?php $secciones = $estudiantes->listarSecciones(); ?>
<div class="box-principal">
<h3 class="titulo">Editar estudiante <?php echo $datos['nombre']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar estudiante <?php echo $datos['nombre']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-3">
	  			<div class="panel panel-default">
				  <div class="panel-body">
          			<img class="img-responsive" src=<?=$imagen;?>>
				  </div>
				</div>
				<ul class="pager">
					<li class="previous"><a href="https://bootswatch.com/superhero/#">&larr; Older</a></li>
				</ul>
	  		</div>
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Nombre del estudiante</label>
				        <input class="form-control" value="<?php echo $datos['nombre']; ?>" name="nombre" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Edad</label>
				        <input class="form-control" value="<?php echo $datos['edad']; ?>" name="edad" type="number" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Promedio</label>
				        <input class="form-control" value="<?php echo $datos['promedio']; ?>" name="promedio" type="number" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Sección </label>
				      <select name="id_seccion" class="form-control">
				      	<?php while($row = mysqli_fetch_array($secciones)){ ?>
				      		<option value="<?php echo $row['id']; ?>" 

				      		<?php 
				      			if ($datos['nombre_seccion'] == $row['nombre'])
				      			{
				      				echo "selected";
				      			}
				      		?>
				      		>
				      		<?php echo $row['nombre']; ?>


				      		</option>
				      	<?php } ?>
				      </select>
				    </div>
				    <input value="<?php echo $datos['id']; ?>" name="id" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Limpiar Datos</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>

