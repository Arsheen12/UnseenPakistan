<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center mt-4 mb-4">
          <a href="index.php" class="text-nowrap logo-img">
            <img src="assets/images/backgrounds/user.png" class="rounded-circle" width="70px" height="70px"/>
          </a>
          <div class="px-2 mt-2">
          <h4><?php  echo $_SESSION['admin'];?></h4>
         </div>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <hr>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">INFORMATION</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="header.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Header</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="architecture.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Architectures</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="heritage.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Architectural Heritage</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="gallery.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Gallery</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="culture.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Culture</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="diversecultures.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Diverse Culture</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="regionalculture.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Regional Culture</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_posts.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Admin Posts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="approveduser_posts.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Approved User Posts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="user_feedback.php" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">User Feedback</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="authentication-login.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="authentication-register.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>