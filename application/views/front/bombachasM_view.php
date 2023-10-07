<section class="engine"><a href="">free css templates</a></section>
 <section class="mbr-section form4 cid-qRjbYih4mz" id="form4-16">
  
  <div class="container">
  
  <?php if (!$productos) { ?>

	<div class="container">
	
		<div class="well">
			<h1> No hay Productos Disponibles</h1>
		</div>	
	</div>

<?php } else { ?>

<div class="container ">
	
	<h2>Bombachas - Mujeres </h2>
	<hr>

	<div class="row text-center">
		<?php foreach($productos->result() as $row){ ?>
			<div class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
 
               <div class="card p-3 col-12 col-md-12">
                <div class="card-img">
					<img src="<?php echo base_url($row->imagen); ?>" alt="">
                </div>
                    </div>

					<div class="caption">
						<h4><?php echo trim($row->descripcion); ?></h4>

						<p>
							<?php 
                                    
								if ($row->stock == 0) {
									echo 'No hay unidades disponibles';
								}else {
									echo 'Disponible: '.$row->stock.' unidades';
								}
							?>
						</p>

						<p>precio: $ <?php echo $row->precio; ?> </p>

						<p>
						<?php 
							if (($row->stock > 0) && ($session_data = $this->session->userdata('logged_in'))) {

								// Envia los datos en forma de formulario para agregar al carrito
								echo form_open('carrito_agrega');
		                        echo form_hidden('idProducto', $row->idProducto);
		                        echo form_hidden('descripcion', $row->descripcion);
		                        echo form_hidden('precio', $row->precio);
		                        echo form_hidden('stock', $row->stock);
		            	?>
		                    	
		                <?php
		                        $btn = array(
		                            'class' => 'btn btn-primary',
		                            'value' => 'Comprar',
		                            'name' => 'action'
		                        	);
		                       
		                        echo form_submit($btn);
		                        echo form_close();
		               	?>
		                  
		               	<?php 
								echo "<a href='#' class='btn btn-default'>Mas Datos</a>";
								
							}else{
								echo "<a href='#' class='btn btn-default'>Mas Datos - Inicie Sesion</a>";
							}
							?>	
						</p>
						
					</div>
				</div>
			</div>
		<?php } ?>	
	</div>

    </div>
<?php } ?>
</div>
</section>