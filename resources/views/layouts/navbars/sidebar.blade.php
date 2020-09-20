<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('LOGO A & S') }}
    </a>
    <h5 style="text-align: center">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h5>
  </div>
  
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Panel administrativo') }}</p>
        </a>
      </li>
      <li class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">library_books</i>
          <p>{{__('Usuarios')}}
            <b class="caret"></b>
          </p>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('profile.edit') }}">
            <i class="material-icons">business</i>
              <p>{{ __('Mi perfil') }}</p>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('user.index') }}">
            <i class="material-icons">supervisor_account</i>
              <p>{{ __('Usuarios registrados') }}</p>
          </a>
        </div>
      </li>

      <li class="nav-item {{ $activePage == 'empresa_encargado' ? ' active' : '' }}">
        <a class="nav-link " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">library_books</i>
          <p>{{__('Empresa-Encargado')}}
            <b class="caret"></b>
          </p>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="">
            <i class="material-icons">business</i>
              <p>{{ __('Empresa') }}</p>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">
            <i class="material-icons">supervisor_account</i>
              <p>{{ __('Encargados') }}</p>
          </a>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Categoria') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>