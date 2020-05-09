<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home')}}" class="simple-text logo-normal">
      {{ __('Digiturno') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'turnos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('turnos') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Turnos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categorias') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Categorías') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'servicios' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('servicios') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Servicios') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'modulos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('modulos') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Modulos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'publicidad' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('publicidad') }}">
          <i class="material-icons">add_to_queue</i>
            <p>{{ __('Publicidad') }}</p>
        </a>
      </li>   
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#configuracion" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material/img/conf.png') }}"></i>
          <p>{{ __('Configuración') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse collapsed" id="configuracion">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil del usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Gestión de usuarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
