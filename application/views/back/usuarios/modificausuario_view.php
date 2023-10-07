<section class="engine"><a href="">free css templates</a></section><section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">

<div class="container">
<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Modificar Datos</h1>
	</div>	            

	<?php echo form_open("verifico_modificausuario/$idUsuario", ['class' => 'form-signin', 'role' => 'form']); ?>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Nombre:', 'nombre'); ?>
					<?php echo form_input(['name' => 'nombre', 
													'id' => 'nombre', 
													'class' => 'form-control',
													'placeholder' => 'Nombre', 
													'required'=>'required', 
													'autofocus'=>'autofocus',
													'value'=>"$nombre"]); ?>
					<?php echo form_error('nombre'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Apellido:', 'apellido'); ?>
					<?php echo form_input(['name' => 'apellido', 
													'id' => 'apellido', 
													'class' => 'form-control',
													'placeholder' => 'Apellido', 
													'required'=>'required',
													'value'=>"$apellido"]); ?>
					<?php echo form_error('apellido'); ?>
				</div>
			</div>
		</div>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('email:', 'email'); ?>
					<?php echo form_input(['type'=>'email', 
													'name' => 'email', 
													'id' => 'email', 
													'class' => 'form-control',
													'placeholder' => 'Email', 
													'required'=>'required',
													'value'=>"$email"]); ?>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Id Rol: 1-Administrador  2-Cliente', 'idRol'); ?>
					<?php echo form_input(['name' => 'idRol', 
													'id' => 'idRol', 
													'class' => 'form-control',
													'placeholder' => '1-Administrador - 2-Cliente', 
													'required'=>'required',
													'value'=>"$idRol"]); ?>
					<?php echo form_error('idRol'); ?>
				</div>
			</div>
		</div>
		<!--<div class="row">
	   		
			<div class="col-md-6">
				<div class="form-group">
					< ?php echo form_label('Contraseña:', 'password'); ?>
					< ? php echo form_password(['name' => 'password', 
													'id' => 'password', 
						 							'class' => 'form-control',
													'placeholder' => 'Contraseña', 
													'required'=>'required',
													'value'=>"$contrasena"]); ? >
					< ?php echo form_error('password'); ?>
				</div>
			</div>
		</div>-->
		<div class="row">
			
			<!--<div class="col-md-6">
				< ?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-warning btn-block'"); ?>	
			</div>-->
			
			<span class="input-group-btn">
                    <button href="" type="submit" class="btn btn-primary btn-form display-4">Modificar</button></span>
			
		</div>
	<?php echo form_close(); ?>
	<div>
		
	</div>
</div>
</div>

</section>
