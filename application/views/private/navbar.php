<!-- Dashboard's Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a class="navbar-brand" href="#">Dashboard hi <?=$this->session->id?> <?=$this->session->username?></a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">

      <ul class="navbar-nav">
        <li class="nav-item btn-rotate">
          <a class="nav-link" target="_blank" href="<?=base_url('/assets/User_Manual.pdf')?>">
            <i class="nc-icon nc-single-copy-04"></i>
            <p>
              <span class="d-lg-none d-md-block">Help Manual </span>
            </p>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item btn-rotate dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="nc-icon nc-settings-gear-65"></i>
            <p>
              <span class="d-lg-none d-md-block">Some Actions</span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=base_url('UserC/View/Users')?>">Admin Profile</a>
            <a class="dropdown-item" href="<?=base_url('UserC/logout')?>">Logout</a>
          </div>
        </li>
      </ul>


    </div>
  </div>
</nav>

<div class="content">
  <div class="row">

    <!-- End --Dashboards Navbar -->