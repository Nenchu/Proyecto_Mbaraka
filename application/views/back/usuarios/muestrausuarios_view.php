<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
<div class="container">
	<div class="well">
		<h1>Todos los Usuarios</h1>
	</div>	
<a type="button" class="btn btn-danger" href="<?php echo base_url('usuarios_eliminados'); ?>">ELIMINADOS</a>
	<br> <br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Estado</th>
				<th>Modificar - Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios->result() as $row){ ?>
			<tr>
				<td><?php echo $row->idUsuario;  ?></td>
                <td><?php echo $row->dni;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->apellido;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php echo $row->descripcion;  ?></td>
				 <?php if ($row->estado =='1') {?>
				<td><?php echo 'Activo';  ?></td>
				<?php } else { ?>
                <td><?php echo 'Inactivo';?></td><?php }?>
				<td><a href="<?php echo base_url("usuarios_modifica/$row->idUsuario");?>">Modificar</a> - <a href="<?php echo base_url("usuarios_elimina/$row->idUsuario");?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<div>
		
	</div>
</div>
</section>