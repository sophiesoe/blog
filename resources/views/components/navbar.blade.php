<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        @guest
          <a href="/register" class="nav-link">Register</a> 
          <a href="/login" class="nav-link">Login</a> 
          @else
          <img src="{{ auth()->user()->avatar }}" width="35" height="35" class="rounded-circle mt-1" alt="">
          <a href="/register" class="nav-link">{{ auth()->user()->name }}</a>
          @can('admin'))
          <a href="/admin/blogs" class="nav-link">My Dashboard</a>  
          @endcan
          <form action="/logout" method="POST">
            @csrf
          <button type="submit" class="nav-link btn btn-link">Logout</button>
          </form>
        @endguest
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>