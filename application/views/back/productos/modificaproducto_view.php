<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
<div class="container">
<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Modificar Datos</h1>	
		<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
		<h6> <b>Tamaño maximo de la imagen 2MB</b></h6>		
	</div>	            

	<?php echo form_open_multipart("verifico_modificaproducto/$idProducto", ['class' => 'form-signin', 'role' => 'form']); ?>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Descripcion:', 'descripcion'); ?>
					<?php echo form_input(['name' => 'descripcion', 
													'id' => 'descripcion', 
													'class' => 'form-control',
													'placeholder' => 'Descripcion', 
													'autofocus'=>'autofocus',
													'value'=>"$descripcion"]); ?>
					<?php echo form_error('descripcion'); ?>
				</div>
			</div>
			
       </div>
       <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Categoria:', 'idCategoria'); ?>	
					<?php echo form_input(['name' => 'idCategoria', 
													'id' => 'idCategoria', 
													'class' => 'form-control',
													'placeholder' => '1-Bombacha Hombre  2-Bombacha Mujer', 
													'value'=>"$idCategoria"]); ?>
					<?php echo form_error('idCategoria'); ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('precio:', 'precio'); ?>
					<?php echo form_input(['name' => 'precio', 
													'id' => 'precio', 
													'class' => 'form-control',
													'placeholder' => 'Precio',
													'value'=>"$precio"]); ?>
					<?php echo form_error('precio'); ?>
				</div>
				
        </div>	
       </div>
       
       <div class="row">
       <div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('stock:', 'stock'); ?>
					<?php echo form_input(['name' => 'stock', 
													'id' => 'stock', 
													'class' => 'form-control',
													'placeholder' => 'Stock',
													'value'=>"$stock"]); ?>
					<?php echo form_error('stock'); ?>
				</div>
			</div>
				
				
				
			</div>
		

		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('imagen actual:', 'img_ac'); ?>
					<img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="<?php  echo base_url($imagen); ?>" >
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('imagen:', 'imagen'); ?>
					<?php echo form_input(['type' => 'file',
													'name' => 'filename', 
													'id' => 'filename', 
													'class' => 'form-control']); ?> 
					<?php echo form_error('filename'); ?>
					<br>
					
					<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-primary btn-block'"); ?>
				</div>		
			</div>
		</div>
	<?php echo form_close(); ?>
	
</div>
</div>

</section>
