<div class="box-principal">
<h3 class="titulo">Vista Secciones</h3>
	<div class="panel panel-sucess">
		<div class="panel-heading">
			<h3 class="panel-title">listado de secciones</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Accion</th>
					</tr>
				</thead>

				<tbody>
					<?php	
						$img_dir = "Views/template/imagenes/avatars".DS; 
						while ($data = mysqli_fetch_array($datos))
						{


					?>
						<tr>
							<td><?=$data["id"] ?></td>
							<td><?=$data["nombre"] ?></td>
							<td>
								<a class="btn btn-warning" href=<?=URL."secciones/editar/".$data["id"];?> >Editar</a>
							
								<a class="btn btn-danger" href=<?=URL."secciones/eliminar/".$data["id"];?> >Eliminar</a>
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
