

<?php 
	//var_dump($estudiantes);
	//$datos = $estudiantes->index();

?>

<div class="box-principal">
<h3 class="titulo">Vista del estudiante principal</h3>
	<div class="panel panel-sucess">
		<div class="panel-heading">
			<h3 class="panel-title">listado de estudiantes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Seccion</th>
						<th>Promedio</th>
						<th>Accion</th>
					</tr>
				</thead>

				<tbody>
					<?php	
						$img_dir = "Views/template/imagenes/avatars".DS; 
						while ($data = mysqli_fetch_array($datos))
						{
							$imagen = "";
							$imagen = $img_dir.$data["imagen"];
							if (!is_readable($imagen))
							{
								$imagen = $img_dir."no-image.png";
							}

							$imagen = URL.$imagen;
								 
							/*if (!is_readable($imagen))
								$imagen = $img_dir."no-image.png";*/
							$ruta_ver = URL."estudiantes/ver/".$data["id"];

					?>
						<tr>
							<td>
								<a href=<?=$ruta_ver;?>>
									<img class="imagen-avatar" src=<?=$imagen;?> alt="Imagen de perfil">
								</a>
							</td>
							<td>
								<a href=<?=$ruta_ver;?>>
									<?=$data["nombre"] ?>
								</a>
							</td>
							<td><?=$data["edad"] ?></td>
							<td><?=$data["nombre_seccion"] ?></td>
							<td><?=$data["promedio"] ?></td>
							<td>
								<a class="btn btn-warning" href=<?=URL."estudiantes/editar/".$data["id"];?> >Editar</a>
							
								<a class="btn btn-danger" href=<?=URL."estudiantes/eliminar/".$data["id"];?> >Eliminar</a>
							</td>
						
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>			
		</div>
	</div>
	
</div>
