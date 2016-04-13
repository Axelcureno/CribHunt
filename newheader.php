<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title logo-container"><a href="<?php echo URL; ?>"><img src="<?php echo URL ?>img/logo.svg" alt="CribHunt"></a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link sugerencias-inline" href=".sugerencias-forma">SUGERENCIAS</a>
      </nav>
    
    <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
      <i class="material-icons">more_vert</i>
    </button>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
        for="demo-menu-lower-right">
      <li class="mdl-menu__item">Iniciar Sesión</li>
      <li class="mdl-menu__item">Perfil</li>
      <li disabled class="mdl-menu__item">Ayuda</li>
    </ul>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Hola, Usuario</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">BUSCAR</a>
      <a class="mdl-navigation__link" href="">PUBLICAR</a>
      <a class="mdl-navigation__link" href="">CERRAR SESIÓN</a>
      <a class="mdl-navigation__link" href="">AYUDA</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">