
<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <div class="container">
        <a class="navbar-brand" href="/home">Posts Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item text-center">
              <a class="nav-link {{ ($title === 'home') ? 'active' : ' ' }}" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'about') ? 'active' : ' ' }}" href="/about">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'posts') ? 'active' : ' ' }}" href="/posts">posts</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link {{ ($title === 'categories') ? 'active' : ' ' }}" href="/categories">categories</a>
            </li> --}}
          </ul>
          <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome Back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2"> My Dashboard </i></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                       <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            </li>
            @else      
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'login') ? 'active' : ' ' }}" aria-current="page" href="/login">Login <i class="bi bi-box-arrow-in-right"></i></a>
            </li>
            @endauth
          </ul>
  
        </div>
      </div>
    </nav>
