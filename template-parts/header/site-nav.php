<nav>               
  <div class="nav-toggler"><span>MENU</span></div>       
  <div class="nav-dropdown">    
    <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_id'        => 'primary-menu',
        'container_class' => 'menu',
      ) );
    ?>    
  </div>
</nav>