<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="{{URL::to('/admin')}}"><img src="/backend/images/2h_.png" class="mr-2" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-layout-grid2"></span>
          </button>
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="/backend/images/logo_2H_tech.png" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-layout-grid2"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
 
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/admin')}}">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="ti-clipboard menu-icon"></i>
                <span class="menu-title">Création</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajouter-categorie')}}">Ajouter Catégorie</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajouter-produit')}}">Ajouter Produit</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajouter-slider')}}">Ajouter Slider</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="ti-layout menu-icon"></i>
                <span class="menu-title">Affichage</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categories')}}">Tous catégories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{URL::to('/produits')}}">Tous les produits</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{URL::to('/sliders')}}">Tous les slider</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{URL::to('/commandes')}}">Commandes</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>   