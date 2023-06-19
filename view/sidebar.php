<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo thisSite(); ?>" class="brand-link">
      <img src="<?php echo thisSite(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Manajemen</b>Kas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
          $id_user = $_SESSION['id_user'];
          $queryUsername = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
          $dataUsername = mysqli_fetch_array($queryUsername);
          $fileGambar = $dataUsername['gambar'];
          $username = $dataUsername['username'];
          ?>
          <div class="img-circle-sidebar">
            <img src="<?php echo thisSite(); ?>profile/<?php echo $fileGambar; ?>" class="elevation-2" alt="User Image">
          </div>
        </div>
        <div class="info d-flex align-items-center">
          <a href="<?php echo thisSite().$_SESSION['role']."/profile"; ?>" style="text-transform: capitalize;"><?php echo $username; ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
            $level = $_SESSION['role']; 
            $queryMenu = mysqli_query($conn,"SELECT `user_menu`.`id_menu`, `menu`
            FROM `user_menu` JOIN `user_access_menu`
            ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`level`='$level'
            ORDER BY `user_access_menu`.`menu_id` ASC");
            while ($menu = mysqli_fetch_array($queryMenu)) {
          ?>
          <li class="nav-header"><?php echo $menu['menu']; ?></li>
          <?php 
              $menuId = $menu['id_menu'];
              $querySubMenu = mysqli_query($conn,"SELECT *
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`
              WHERE `user_sub_menu`.`menu_id`= $menuId
              AND `user_sub_menu`.`is_active` = 1");
              
              while ($subMenu = mysqli_fetch_array($querySubMenu)) {
            ?>
          <li class="nav-item">
            <a href="<?php echo site_url($subMenu['url']); ?>" class="nav-link">
              <i class="nav-icon <?php echo $subMenu['icon']; ?>"></i>
              <p>
                <?= $subMenu['title']; ?>
              </p>
            </a>
          </li>
          <?php }} ?>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
           <a href="<?php echo thisSite().$_SESSION['role']."/profile"; ?>" class="nav-link">
             <i class="nav-icon fa-solid fa-user-gear"></i>
             <p>Profile</p>
           </a>
          </li>
          <li class="nav-item">
           <a href="<?php echo thisSite(); ?>logout.php" class="nav-link bg-danger">
             <i class="nav-icon fa-solid fa-right-from-bracket"></i>
             <p>Logout</p>
           </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
