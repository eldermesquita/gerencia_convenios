<nav id="sidebar" class="sidebar js-sidebar ">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">JD</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                 Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class)): ?>
                <li class="sidebar-item">
                    <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                        <i class="align-middle me-2 fas fa-fw fa-user-shield"></i>
                    <span class="align-middle">Acesso e Permissão</span>
                    </a>
                    <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\User::class)): ?>
                            <li class="sidebar-item <?php echo e(request()->is('users*') ? 'active' : ''); ?>">
                                <a class="sidebar-link"  href="<?php echo e(route('users.index')); ?>" ><span class="align-middle">Usuários</span> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', Spatie\Permission\Models\Role::class)): ?>
                            <li class="sidebar-item <?php echo e(request()->is('roles*') ? 'active' : ''); ?>">
                                <a class="sidebar-link"  href="<?php echo e(route('roles.index')); ?>"> Grupos</a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', Spatie\Permission\Models\Permission::class)): ?>
                            <li class="sidebar-item <?php echo e(request()->is('permissions*') ? 'active' : ''); ?>">
                                <a class="sidebar-link" href="<?php echo e(route('permissions.index')); ?>"> Permissões </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Empresa::class)): ?>

            <li class="sidebar-item">
                <a data-bs-target="#Local" data-bs-toggle="collapse" class="sidebar-link <?php echo e(request()->is('empresas*') ? 'collapsed' : ''); ?> " aria-expanded="false">
                    <i class="align-middle" data-feather="map"></i>
                <span class="align-middle">Empresas</span>
                </a>
                <ul id="Local" class="sidebar-dropdown list-unstyled collapse <?php echo e(request()->is('empresas*') ? 'show' : ''); ?>" data-bs-parent="#sidebar" >

                        <li class="sidebar-item <?php echo e(request()->is('empresas/create') ? 'active' : ''); ?> ">
                            <a class="sidebar-link"  href="<?php echo e(route('empresas.create')); ?>" >
                               
                                <span class="align-middle">Cadastro  </span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo e(request()->is('empresas') ? 'active' : ''); ?>">
                            <a class="sidebar-link"  href="<?php echo e(route('empresas.index')); ?>" >
                               
                                <span class="align-middle">Pesquisar</span>
                            </a>
                        </li>

                </ul>
            </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Convenio::class)): ?>
            <a class="dropdown-item" href="<?php echo e(route('convenios.index')); ?>"></a>
            <li class="sidebar-item">
                <a data-bs-target="#convenios" data-bs-toggle="collapse" class="sidebar-link <?php echo e(request()->is('convenios*') ? 'collapsed' : ''); ?> " aria-expanded="false">
                    <i class="fa-solid fa-file-invoice"></i>
                <span class="align-middle">Convenios</span>
                </a>
                <ul id="convenios" class="sidebar-dropdown list-unstyled collapse <?php echo e(request()->is('convenios*') ? 'show' : ''); ?>" data-bs-parent="#sidebar" >

                        <li class="sidebar-item <?php echo e(request()->is('convenios/create') ? 'active' : ''); ?> ">
                            <a class="sidebar-link"  href="<?php echo e(route('convenios.create')); ?>" >
                               
                                <span class="align-middle">Cadastro  </span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php echo e(request()->is('convenios') ? 'active' : ''); ?>">
                            <a class="sidebar-link"  href="<?php echo e(route('convenios.index')); ?>" >
                               
                                <span class="align-middle">Pesquisar</span>
                            </a>
                        </li>

                </ul>
            </li>

            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Aditivo::class)): ?>
            <a class="dropdown-item" href="<?php echo e(route('aditivos.index')); ?>">Aditivos</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Orgao::class)): ?>
            <a class="dropdown-item" href="<?php echo e(route('orgaos.index')); ?>">Orgaos</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-any', App\Models\Contrato::class)): ?>
            <a class="dropdown-item" href="<?php echo e(route('contratos.index')); ?>">Contratos</a>
            <?php endif; ?>


        </ul>


    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/layouts/nav.blade.php ENDPATH**/ ?>