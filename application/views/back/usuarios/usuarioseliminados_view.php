<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
    <?php if (!$usuarios) { ?>

	<div class="container p-5 text-center">
		<div class="well">
			<h1>No hay Eliminados</h1>
		</div>	
	</div>

<?php } else { ?>

	<div class="container">
		<div class="well">
			<h1>Todos los Eliminados</h1>
		</div>	
<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>ID Rol</th>
				<th>Estado</th>
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
					<td> <a href="<?php echo base_url("usuarios_activa/$row->idUsuario");?>">Activar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>
</section>