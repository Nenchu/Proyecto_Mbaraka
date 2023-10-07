<section class="engine"><a href="">free css templates</a></section>
<section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">

 <?php if (!$consulta) { ?>

	<div class="container p-5">
		<div class="well text-center">
			<h1>No hay Consulta de Clientes</h1>
		</div>
		
	</div>

<?php } else { ?>

<div class="container">
	<div class="well">
		<h1>Todas las Consultas - Clientes</h1>
	</div>	

	<br> <br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Responder-Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($consulta->result() as $row){ ?>
			<tr>
				<td><?php echo $row->idconsulta;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->telefono;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php echo $row->mensaje;  ?></td>
				
				<td><a href="#">Responder</a> - <a href="<?php echo base_url("consulta_eliminar/$row->idconsulta");?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	
</div>
<?php } ?>
</section>