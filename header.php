            <?php if (isset($_SESSION['usersicam'])){ echo '<input type="checkbox" id="nav-trigger" class="nav-trigger" /><label class="ripple" for="nav-trigger"></label>'; }  ?>
            <div class="main-menu">
                <div <?php if (isset($_SESSION['usersicam'])){ echo 'style="  margin-left: 65px; "'; }  ?> class="logo-container">
                    <a href="<?php echo URL; ?>"><img src="<?php echo URL ?>img/logo.svg" alt="CribHunt"></a>
                </div>
                <div class="search-container">
                        <form id="cribsearch" action="" method="get">
                            <input id="cribhunt-searchfield" type="text" placeholder="<?php if (isset($_GET['cribsearch'])) { echo $_GET['cribsearch']; } else { echo 'Casa, 3 cuartos, 3 baños, Mérida...'; } ?>" name="cribsearch">
                            <input id="cribsearch-submit" type="submit" value="">
                        </form>
                </div>

                <div class="toolbar">
                    <div class="titulo-mainnav"><h2>Casas, departamentos y cuartos en renta.</h2></div>
                    <div class="usuario-bienvenido"><a class="sugerencias-inline" href=".sugerencias-forma"><button class="holausuario ripple">SUGERENCIAS</button></a></div>
                        <div class="perfil-container">
                            <?php if (!isset($_SESSION['usersicam'])) {
                                echo '<a href="'. URL .'login.php"><button class="iniciar-sesion ripple">PUBLICAR</button></a>';
                            } else {
                                echo '<a href="'. URL .'logout.php"><button class="iniciar-sesion ripple">CERRAR SESIÓN</button></a>';
                                } ?>    
                        </div>
                </div>
            </div>
        <ul class="navigation">
          <div class="perfil-usuario">
              <img class="profilepic-user" src="<?php echo URL; ?>img/ui/ui-mask.png" alt="">
              <div class="hello-usuario">Hola, <?php echo $nombreusuario;?></div>
          </div>
          <div class="menu-de-usuario">
              <div class="que-deseas">
              ¿Qué deseas hacer?
          </div>
              <!--<a class="nav-a-item" href="#"><button class="ripple nav-ripple"><li class="nav-item">Mis Cribs</li></button></a>-->
              <a class="nav-a-item" href="<?php echo URL; ?>"><button class="ripple nav-ripple"><li class="nav-item">Buscar Crib</li></button></a>
              <a class="nav-a-item" href="<?php echo URL; ?>addcrib.php"><button class="ripple nav-ripple"><li class="nav-item">Publicar Crib</li></button></a>
              <!--<a class="nav-a-item" href="#"><li class="nav-item"><button class="ripple nav-ripple">Administrar Perfil</li></button></a>-->
              <a class="nav-a-item" href="<?php echo URL; ?>logout.php"><button class="ripple nav-ripple"><li class="nav-item last-nav-item">Cerrar Sesión</li></button></a>
              <a class="nav-a-item" href="<?php echo URL; ?>#"><button class="ripple nav-ripple"><li class="nav-item last-nav-item">Ayuda</li></button></a>
          </div>
        </ul>
            <div class="canvas-cribhunt">
            <div id="parameter-search">
            <form id="parameter-cribsearch" action="" method="get">
                <div class="linea-parameter-search">
                    <label for="ciudadocolonia">Ciudad y/o Colonia</label>
                    <input id="cribsearch-places" type="text" placeholder=" <?php if (isset($_GET['ciudad-cribsearch'])) { echo $_GET['ciudad-cribsearch']; } else { echo "Francisco de Montejo, Mérida"; } ?>" name="ciudadocolonia">
                </div>
                <div class="linea-parameter-search">
                    <label for="categoria">Categoría</label>
                    <select id="parameter-select" name="categoria">
                      <option value="cualquiera" selected>Cualquiera</option>
                      <option value="casa">Casa</option>
                      <option value="departamento">Departamento</option>
                      <option value="cuarto">Cuarto</option>
                    </select>
                </div>
                <div class="linea-parameter-search no-border-bottom-linea">
                    <label for="precio">Precio</label>
                    <div id="slider-precio-cribsearch"></div>
                    <input type="text" id="amount" name="precio" readonly>
                    <button id="submit-parameter-cribsearch"></button>
                </div>
            </form>
            </div>
<div class="se-pre-con">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>