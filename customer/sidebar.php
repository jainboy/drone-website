  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HawaaiAdda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin1/dist/img/admin/<?php echo $_SESSION['USER_IMAGE']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile" class="d-block"><?php echo $_SESSION['USER_NAME']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="customer_dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="map" class="nav-link">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Maps
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="operation" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
              <p>
                Opertion
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="flight" class="nav-link">
              <i class="nav-icon fas fa-plane"></i>
              <p>
                Flight
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="team" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Personnel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project" class="nav-link">
                  <i class="fas fa-fighter-jet nav-icon"></i>
                  <p>Aircraft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project" class="nav-link">
                  <i class="fas fa-battery-half nav-icon"></i>
                  <p>Batteries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Checklists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project" class="nav-link">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contact" class="nav-link">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
              <a href="drone" class="nav-link">
                <i class="nav-icon fas fa-plane"></i>
                <p>
                  Drone
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="dorne_log" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Drone Log</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="drone_pilot" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Drone Pilot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="intellgence" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Intellgence</p>
                  </a>
                </li>
              </ul>
            </li>
          <li class="nav-header">SHOPPING</li>
          <li class="nav-item">
            <a href="all_order" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>All Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="wishlist" class="nav-link">
            <i class="nav-icon fas fa-heart"></i>
                    <p>Wishlist</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change_password" class="nav-link">
                  <i class="fa fa-key nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Log Out</p>
            </a>
          </li>
            </ul>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>