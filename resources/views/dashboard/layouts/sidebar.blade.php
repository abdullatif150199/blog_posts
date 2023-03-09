<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ' ' }} " aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ' ' }}" aria-current="page" href="/dashboard/posts">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Posts
          </a>
        </li>
      </ul>

      @can('admin')    
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center text-muted mt-5 ms-5 mb-0">
        <span>Administrator</span>
      </h6>
        <div class="position-sticky sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ' ' }}" aria-current="page" href="/dashboard/categories" style="font-size: 14px">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Manage Categories
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : ' ' }}" aria-current="page" href="/dashboard/users">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Manage Posts
              </a>
            </li>
          </ul>
        </div>
      @endcan


      <a href="/posts" class="btn btn-success" style="position: fixed; bottom: 20px; margin: auto">Back To All Posts <i class="bi bi-box-arrow-right"></i> </a>

 </nav>