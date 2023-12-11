<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand logo_blanco text-center" style="text-align: center;">
      <img class="img-responsive img-rounded"
        src="<?= str_replace("Home/", "", base_url()) . 'assets/images/LogoMQ.jpg'; ?>"  alt="User picture" align="center">
    </div>
    <div class="sidebar-brand">
      <a href="#">Version 1.0</a>
        <div id="close-sidebar">
          <i class="fa fa-arrow-circle-o-left"></i>
        </div>
    </div>
    <div class="sidebar-header">
      <div class="user-info text-left">
        <span class="user-name">
          <?php echo 'Usuario: ' . $this->session->userdata('user') ?>
        </span>
        <span class="user-role">
          <?php echo ($this->session->userdata('perfil') == 1) ? "Administrador" : "Operario" ?>
        </span>
      </div>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">
          <a href="#" style="font-weight: bold;">MENÚ DE OPCIONES</a>
          <br><br>
        </li>
        <li class="sidebar-dropdown text-left">
          <a href="#">
            <i class="fa fa-key"></i>
            <span>Administración</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <form name="AdminForm" id="AdminForm" action="#" method="POST">
                <input type="hidden" name="IdCrearUsuario" value="1">
                <li>
                  <a href="<?= str_replace("Home/", "", base_url()) . 'Inicio/Usuario'; ?>" onclick="cargarPantalla('')">Crear usuario</a>
                </li>
                <li>
                  <a href="#" onclick="cargarPantalla('')">Asignar permisos</a>
                </li>
              </form>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown text-left">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Operación</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <form name="AdminForm" id="AdminForm" action="<?= base_url() . 'Inicio/aplicaciones'; ?>" method="POST">
                <input type="hidden" name="IdCrearUsuario" value="1">
                <li>
                  <a href="<?= str_replace("Home/", "", base_url()) . 'Inicio/aplicaciones'; ?>" onclick="cargarPantalla('')">Aplicaciones</a>
                </li>
                <li>
                  <a href="#" onclick="cargarPantalla('')">Registrar aplicación</a>
                </li>
              </form>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown text-left">
          <a href="#">
            <i class="fa fa-umbrella"></i>
            <span>Ayuda</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <form name="AdminForm" id="AdminForm" action="#" method="POST">
                <input type="hidden" name="IdCrearUsuario" value="1">
                <li>
                  <a href="#" onclick="cargarPantalla('')">Ayuda</a>
                </li>
                <li>
                  <a href="#" onclick="cargarPantalla('')">Contactenos</a>
                </li>
                <li>
                  <a href="#" onclick="cargarPantalla('')">PQRD</a>
                </li>
              </form>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown text-left">
          <a href="#">
            <i class="fa fa-sign-out"></i>
            <span>Salida Segura</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <form name="AdminForm" id="AdminForm" action="#" method="POST">
                <input type="hidden" name="IdCrearUsuario" value="1">
                <li>
                  <a href="<?php echo base_url('logout_ci') ?>" onclick="cargarPantalla('')">Salir</a>
                </li>
              </form>
            </ul>
          </div>
        </li>
      </ul>
    </div>
</nav>

<script>
  function cargarPantalla(formulario) {
    document.getElementById(formulario).submit();
  }
</script>