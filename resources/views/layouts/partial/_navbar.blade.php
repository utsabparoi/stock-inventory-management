  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>
      <form action="{{ route('language.switch') }}" method="POST">
          @csrf
          <select name="locale" onchange="this.form.submit()">
              <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
              <option value="es" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>বাংলা</option>
          </select>
      </form>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <p class="nav-link m-0"> <i class="fa fa-user"> </i> {{ Auth::user()->name ?? '' }}</p>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
