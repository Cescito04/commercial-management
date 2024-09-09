<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('customer.index') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('assets/img/logo.png') }}" alt="">
          <span>Ecommande</span>
      </a>

      <nav id="navbar" class="navbar">
          <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="{{ route('customer.all') }}">Tous les produits</a></li>
              <li><a class="nav-link scrollto" href="{{route('customer.orders')}}">Commande</a></li>

              @auth
                  <li><a class="nav-link scrollto me-5" href="#" style="color: rgb(94, 155, 2)"> <i class="fas fa-user"></i>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></li>
                  <li>
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="btn btn-link nav-link scrollto" style="color: red">Déconnexion</button>
                      </form>
                  </li>
              @else
                  <li><a class="getstarted scrollto" href="{{ route('login') }}">Se connecter</a></li>
              @endauth
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

  </div>
</header>
