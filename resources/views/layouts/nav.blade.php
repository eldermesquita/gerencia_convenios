<nav id="sidebar" class="sidebar js-sidebar ">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">JD</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            @auth
            @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
            <li class="sidebar-item">
                <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed"
                    aria-expanded="false">
                    <i class="align-middle me-2 fas fa-fw fa-user-shield"></i>
                    <span class="align-middle">Acesso e Permissão</span>
                </a>
                <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    @can('view-any', App\Models\Usuario::class)
                    <li class="sidebar-item {{ request()->is('usuarios*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('usuarios.index') }}"><span
                                class="align-middle">Usuários</span> </a>
                    </li>
                    @endcan
                    @can('view-any', Spatie\Permission\Models\Role::class)
                    <li class="sidebar-item {{ request()->is('roles*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('roles.index') }}"> Grupos</a>
                    </li>
                    @endcan
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                    <li class="sidebar-item {{ request()->is('permissions*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('permissions.index') }}"> Permissões </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @endauth

            @can('view-any', App\Models\Empresa::class)

            <li class="sidebar-item">
                <a data-bs-target="#Local" data-bs-toggle="collapse"
                    class="sidebar-link {{ request()->is('empresas*') ? 'collapsed' : '' }} " aria-expanded="false">
                    <i class="align-middle" data-feather="map"></i>
                    <span class="align-middle">Empresas</span>
                </a>
                <ul id="Local"
                    class="sidebar-dropdown list-unstyled collapse {{ request()->is('empresas*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar">

                    <li class="sidebar-item {{ request()->is('empresas/create') ? 'active' : '' }} ">
                        <a class="sidebar-link" href="{{ route('empresas.create') }}">
                            {{-- <i class="align-middle" data-feather="plus"></i> --}}
                            <span class="align-middle">Cadastro </span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('empresas') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('empresas.index') }}">
                            {{-- <i class="align-middle" data-feather="search"></i> --}}
                            <span class="align-middle">Pesquisar</span>
                        </a>
                    </li>

                </ul>
            </li>

            @endcan

            @can('view-any', App\Models\Convenio::class)
            <a class="dropdown-item" href="{{ route('convenios.index') }}"></a>
            <li class="sidebar-item">
                <a data-bs-target="#convenios" data-bs-toggle="collapse"
                    class="sidebar-link {{ request()->is('convenios*') ? 'collapsed' : '' }} " aria-expanded="false">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="align-middle">Convenios</span>
                </a>
                <ul id="convenios"
                    class="sidebar-dropdown list-unstyled collapse {{ request()->is('convenios*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar">

                    <li class="sidebar-item {{ request()->is('convenios/create') ? 'active' : '' }} ">
                        <a class="sidebar-link" href="{{ route('convenios.create') }}">
                            {{-- <i class="align-middle" data-feather="plus"></i> --}}
                            <span class="align-middle">Cadastro </span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('convenios') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('convenios.index') }}">
                            {{-- <i class="align-middle" data-feather="search"></i> --}}
                            <span class="align-middle">Pesquisar</span>
                        </a>
                    </li>

                </ul>
            </li>

            @endcan
            @can('view-any', App\Models\Aditivo::class)
            <a class="dropdown-item" href="{{ route('aditivos.index') }}">Aditivos</a>
            @endcan
            @can('view-any', App\Models\Orgao::class)
            <a class="dropdown-item" href="{{ route('orgaos.index') }}">Orgaos</a>
            @endcan
            @can('view-any', App\Models\Contrato::class)
            <a class="dropdown-item" href="{{ route('contratos.index') }}">Contratos</a>
            @endcan


        </ul>


    </div>
</nav>
