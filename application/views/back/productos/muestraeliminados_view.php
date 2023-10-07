<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
    <?php if (!$productos) { ?>

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

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					
					<th>Descripcion</th>
					<th>categoria</th>
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
					 <?php if ($row->estado =='1') {?>
				<td><?php echo 'Activo';  ?></td>
				<?php } else { ?>
                <td><?php echo 'Inactivo';?></td><?php }?>
					<td><a href="<?php echo base_url("productos_modifica/$row->idProducto");?>">Modificar</a> - <a href="<?php echo base_url("productos_activa/$row->idProducto");?>">Activar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>
</section>