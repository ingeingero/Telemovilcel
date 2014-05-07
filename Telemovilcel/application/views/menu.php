<div  id="navbar-example" class="navbar navbar-inverse navbar-fixed-top">

              <div class="navbar-inner">
                <div class="container">
                  <a class="brand" href="<?php echo base_url() ?>"><li class="icon-envelope icon-white"></li> Telemovilcel </a>
                  <ul class="nav" role="navigation">
                    <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Basicos<b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                     
                       
                       
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/marcas">Marcas</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/categorias">Categorias</a></li>
        
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/vitrinas">Vitrinas</a></li>
                    
                                                       <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>-->
                      </ul>
                    </li>
                   <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Inventario<b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                     
                       
                       
                               <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/inventario">Ver Inventario</a></li>
                               <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/agotada">Mercancia Agotada (Menos a 2 unidades)</a></li>
               
                                                       <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>-->
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Parametros<b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                     
                       
                       
                               <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/correspondencia_recibida">Recibir Correspondencia</a></li>-->
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/parametros_sistema">Parametros</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/usuarios">Usuarios</a></li>
                                                       <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>-->
                      </ul>
                    </li>
                  
                   <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $nombre_usuario; ?></b><b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                     
                       
                       
                               <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/correspondencia_recibida">Recibir Correspondencia</a></li>-->
                               <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/modules/mi_cuenta">Mi Cuenta</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/usuarios/destroy">Salir</a></li>
                                                       <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>-->
                      </ul>
                    </li>
                    
                   
              
                  
              
             
                  
                  </ul>
                </div>
              </div>
            </div>