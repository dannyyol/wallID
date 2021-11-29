<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="/admin">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
              <router-link to="/admin/users" class="nav-link">
                <span>All users</span>
              </router-link>
          </li>

          <li class="nav-item"> 
              <router-link to="/admin/users/active" class="nav-link">
                <span>Active users</span>
              </router-link>
          </li>

          <li class="nav-item"> 
              <router-link to="/admin/users/suspended" class="nav-link">
                <span>Suspended users</span>
              </router-link>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#organizations" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Organizations</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="organizations">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
              <router-link to="/admin/organizations" class="nav-link">
                <span>View All</span>
              </router-link>
          </li>

          <li class="nav-item"> 
              <router-link to="/admin/organizations/0" class="nav-link">
                <span>View Suspended</span>
              </router-link>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tickets" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Events</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tickets">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
              <router-link to="/admin/events" class="nav-link">
                <span>View All</span>
              </router-link>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#payments" aria-expanded="false" aria-controls="charts">
        <i class="ti-money menu-icon"></i>
        <span class="menu-title">Payment History</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="payments">
        <ul class="nav flex-column sub-menu">
          <router-link to="/admin/payments" class="nav-link">
                <span>View All</span>
              </router-link>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="charts">
        <i class="ti-user menu-icon"></i>
        <span class="menu-title">Admins</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="admins">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/tickets">All</a></li>
          <li class="nav-item d-none"> <a class="nav-link" href="/admin/groups/1">Create</a></li>
          <li class="nav-item d-none"> <a class="nav-link" href="/admin/groups/0">Suspended</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item d-none">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item d-none">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item d-none">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item d-none">
      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item d-none">
      <a class="nav-link" href="pages/documentation/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>