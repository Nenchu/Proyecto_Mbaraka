<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
    <?php if (!$productos) { ?>

	<div class="container">
		<div class="well">
			<h1>No hay bombachas Disponibles</h1>
		</div>

		<?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
			<a type="button" class="btn btn-success" href="<?php echo base_url('productos_agrega'); ?>">Agregar</a>
			<br> <br>
		<?php } ?>

	</div>

<?php } else { ?>

	<div class="container">
		<div class="well">
			<h1>Todas las Bombachas Hombre</h1>
		</div>	
		<a type="button" class="btn btn-success" href="<?php echo base_url('productos_agrega'); ?>">Agregar</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos->result() as $row){ ?>
				<tr>
					<td><?php echo $row->idProducto;  ?></td>
					<td><?php echo $row->descripcion;  ?></td>
					<td><?php echo $row->descripcionCateg;  ?></td>
					<td><?php echo $row->stock;  ?></td>
					<td><?php echo $row->imagen;  ?></td>
					<td><?php echo $row->precio;  ?></td>
					<td><?php echo $row->estado;  ?></td>
					<td><a href="<?php echo base_url("productos_modifica/$row->idProducto");?>">Modificar</a> - <a href="<?php echo base_url("productos_elimina/$row->idProducto");?>">Eliminar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>


</section>