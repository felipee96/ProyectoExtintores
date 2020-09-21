<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
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
          <a class="dropdown-item" href="{{ route('empresa') }}">
            <i class="material-icons">business</i>
              <p>{{ __('Empresa') }}</p>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('encargado') }}">
            <i class="material-icons">supervisor_account</i>
              <p>{{ __('Encargados') }}</p>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown {{ $activePage == 'categoria' ? ' active' : '' }}">
    <a class="nav-link " data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
      <i class="material-icons">library_books</i>
      <p>{{__('Categoria')}}</p></a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ route('categoria') }}">
        <i class="material-icons">category</i>
          <p>{{ __('Categoria') }}</p>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{ route('subCategoria') }}">
        <i class="material-icons">bubble_chart</i>
          <p>{{ __('SubCategoria') }}</p>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{ route('unidad') }}">
        <i class="material-icons">drag_indicator</i>
          <p>{{ __('Unidad') }}</p>
      </a>
    </div>
  </li>
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