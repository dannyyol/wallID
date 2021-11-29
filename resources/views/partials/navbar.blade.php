<header class="header-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 main-menu-container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
              <img style="width: 170px" src="images/logo.png" alt="WALLID" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
              <ul class="navbar-nav ml-auto main-menu align-items-center">

                <li class="nav-item">
                  <a class="nav-link page-scroll" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="/ticket-plans">Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="/faq">Faq's</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="/contact">Contact</a>
                </li>

              </ul>

                <ul class="nav_btn">
                  @guest
                  <li class="nav-item mx-3">
                    <a class="btn theme-btn btn-shadow" href="/login"><i class="fa fa-user btn-icon mr-1"></i> log in</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn theme-btn btn-shadow" href="/register/account-type"><i class="fa fa-user-plus btn-icon mr-1"></i>Sign Up</a>
                  </li>
                  @else
                    <li class="nav-item">
                      <a class="btn theme-btn btn-shadow" href="/home"><i class="fa fa-user-plus btn-icon mr-1">
                        </i>Dashboard</a>
                    </li>
                  @endguest
                </ul>
        
            </div>
          </nav>
        </div>
      </div>
    </div>
</header>