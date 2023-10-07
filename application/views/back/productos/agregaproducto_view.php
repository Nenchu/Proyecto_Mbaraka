<section class="engine"><a href="">free html templates</a></section>
 <section class="features18 popup-btn-cards cid-qRjltICp37" id="features18-1h">
<div class="container">
	<div class="well col-lg-8">
		<h2>Cargar nuevo producto</h2>
		<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6> <h6> <b>Tamaño maximo de la imagen 2MB</b></h6>	
	</div>
	
	<div class="row">
		<div class="col-lg-8">

			<?php echo validation_errors(); ?>
			<!-- Genero el formulario para cargar un producto -->

			<div class="well bs-component form-horizontal">
				<?php echo form_open_multipart('verifico_nuevoproducto', 
									['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
				<fieldset>
					<div class="form-group">
				
						<div class="col-lg-10">
							<?php echo form_input(['name' => 'descripcion', 
													'id' => 'descripcion', 
													'class' => 'form-control',
													'placeholder' => 'Descripción', 
													'autofocus'=>'autofocus',
													'value'=>set_value('descripcion')]); ?>
						</div>
					</div>
					<div class="form-group">
						
						<div class="col-lg-10">
							<?php echo form_input(['name' => 'idCategoria', 
													'id' => 'idCategoria', 
													'class' => 'form-control',
													'placeholder' => '1-Bombacha Hombre  2-Bombacha Mujer', 
													'value'=>set_value('idCategoria')]); ?>
						</div>
					</div>
					<div class="form-group">
						
						<div class="col-lg-10">
							<?php echo form_input(['name' => 'precio', 
													'id' => 'precio', 
													'class' => 'form-control',
													'placeholder' => 'Precio ', 
													'value'=>set_value('precio')]); ?>
						</div>
					</div>
					
					<div class="form-group">
						
						<div class="col-lg-10">
							<?php echo form_input(['name' => 'stock', 
													'id' => 'stock', 
													'class' => 'form-control',
													'placeholder' => 'Stock',
													'value'=>set_value('stock')]); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">imagen</label>
						<div class="col-lg-10">
							<?php echo form_input(['type' => 'file',
													'name' => 'filename', 
													'id' => 'filename', 
													'class' => 'form-control']); ?> 

						</div>
					</div>
					<div class="col-lg-5 col-lg-offset-5">
						<?php echo form_submit('submit', 'Cargar',"class='btn btn-lg btn-primary btn-block'"); ?> <br>
						<?php echo form_close(); ?>
					</div>
				</fieldset>
				
			</div>
		</div>
	</div>
</div> 
</section>   
