 <section class="menu cid-qRiGjlTiuT" once="menu" id="menu1-e">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="<?php echo base_url('home');?>">
                         <img src="<?php echo base_url('assets/images/logo-mbaraka-blanco-474x119.png'); ?>" alt="" title="" style="height: 3.8rem;">
                    </a>
                </span>
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
           <!--menu del administrador -->
           
<?php if( ($this->session->userdata('logged_in')) and ($idRol == '1') ) { ?> 
            
                   <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                   <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="<?php echo base_url('home');?>">Home</a>
                   </li>
                      <li class="nav-item dropdown open">
                       <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true" target="_blank">Productos</a>
                       <div class="dropdown-menu">
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('productos_todos');?>">Altas - Bajas -      Modificaciones</a>
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('productos_bombachasH');?>">Bombachas Hombre</a>
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('productos_bombachasM');?>">Bombachas Mujeres</a>
                        </div>
                       </li>
                       
                       <li class="nav-item">
                       <a class="nav-link link text-white display-4" href="<?php echo base_url('usuarios_todos');?>"> Usuarios</a>
                       
                       </li>
                         <li class="nav-item">
                       <a class="nav-link link text-white display-4" href="<?php echo base_url('consultas');?>"> Clientes</a>
                       
                       </li>
                         <li class="nav-item"><a class="nav-link link text-white display-4"><b>ADMINISTRADOR: <?= $nombre ?></b></a></li>
                       </ul>
            
           <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success display-4" href="<?php echo base_url('logout');?>">Cerrar Sesión</a></div>
           
          <!--menu del cliente -->    
          
    <?php } else if( ($this->session->userdata('logged_in')) and ($idRol == '2') ) { ?> 
        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="<?php echo base_url('home');?>">Home</a>
                </li>
                      <li class="nav-item dropdown open">
                       <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true" target="_blank">Comprar</a>
                       <div class="dropdown-menu">
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('bombachasH');?>">Bombachas Hombres</a>
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('bombachasM');?>">Bombachas Mujeres</a>
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('commerce');?>">Comercialización</a>
                       </div>
                       </li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo base_url('about');?>">
                        Quienes Somos</a>
                </li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo base_url('contact');?>">
                        Contacto</a>
                </li>
                <li class="nav-item"><a class="nav-link link text-white display-4"><b>Bienvenido: <?= $nombre ?></b></a></li>
        </ul>
                       
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success display-4" href="<?php echo base_url('logout');?>">Cerrar Sesión</a></div>
       
             <!--menu del usuario comun --> 
              
     <?php } else { ?> 
                   <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="<?php echo base_url('home');?>">Home</a>
                </li><li class="nav-item dropdown open">
                       <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true" target="_blank">Ventas</a>
                       <div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="<?php echo base_url('catalogo');?>">Catálogo</a>
                       <a class="text-white dropdown-item display-4" href="<?php echo base_url('commerce');?>">Comercialización</a>
                       </div></li><li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo base_url('about');?>">
                        Quiénes Somos</a>
                        </li><li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo base_url('contact');?>">
                        Contacto</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo base_url('signin');?>">Registrarse&nbsp;</a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success display-4" href="<?php echo base_url('login');?>">Iniciar Sesión</a>
               
                </div>
                  <?php } ?> 
            
        </div>
        
    </nav>
    
</section>
