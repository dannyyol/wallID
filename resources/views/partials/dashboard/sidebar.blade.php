<nav class="sidebar sidebar-offcanvas shadow-sm" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <router-link to="/{{Auth::user()->type}}" class="nav-link">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
      </router-link>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#events" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Events</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse" id="events">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
              <router-link to="/{{Auth::user()->type}}/events/create" class="nav-link">
                <span>Create Event</span>
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/{{Auth::user()->type}}/events" class="nav-link">
                <span>View Events</span>
              </router-link>
            </li>

            <li class="nav-item"> 
              <router-link to="/{{Auth::user()->type}}/events/invites" class="nav-link">
                <span>Event Invites</span>
              </router-link>
            </li>

            <li class="nav-item"> 
              <router-link to="/{{Auth::user()->type}}/events/requests" class="nav-link">
                <span>Event Requests</span>
              </router-link>
            </li>
        </ul>
      </div>
    </li>

    @if(Auth::user()->type == 'individual')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#organizations" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Organizations</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="organizations">
          <ul class="nav flex-column sub-menu">

              <li class="nav-item"> 
                <router-link to="/{{Auth::user()->type}}/organizations" class="nav-link">
                  <span>Approved</span>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/{{Auth::user()->type}}/organizations/pending" class="nav-link">
                  <span>Pending</span>
                </router-link>
              </li>
          </ul>
        </div>
      </li>
    @endif

    @if(Auth::user()->type == 'organization')
      <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#organizations" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Membership</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="organizations">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <router-link to="/organization/members/requests" class="nav-link">
              <span>Requests</span>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/organization/members" class="nav-link">
              <span>Members</span>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/organization/categories" class="nav-link">
              <span>Category</span>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/organization/subscriptions" class="nav-link">
              <span>Subscriptions</span>
            </router-link>
          </li>
        </ul>
      </div>
    </li>
    @endif

  </ul>
</nav>