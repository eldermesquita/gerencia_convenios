<?php
$paginaLogin = Route::is('login');
?>

<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> Gerência Convênios </title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js','resources/sass/app.scss','resources/css/app.css']); ?>
    <?php if(!$paginaLogin): ?>
        <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
        <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->head; } ?>
    <?php endif; ?>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">

        <div class="wrapper">
                    <?php if(!$paginaLogin): ?>
                          <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
            <div class="main">

                <?php if(!$paginaLogin): ?>
                    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <main class="content">
                    <?php if(!$paginaLogin): ?>
                        <?php if (!isset($__inertiaSsrDispatched)) { $__inertiaSsrDispatched = true; $__inertiaSsrResponse = app(\Inertia\Ssr\Gateway::class)->dispatch($page); }  if ($__inertiaSsrResponse) { echo $__inertiaSsrResponse->body; } else { ?><div id="app" data-page="<?php echo e(json_encode($page)); ?>"></div><?php } ?>
                    <?php else: ?>
                       <?php echo $__env->yieldContent('content'); ?>
                    <?php endif; ?>
                </main>
                <?php if(!$paginaLogin): ?>
                     <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>

    <?php echo $__env->yieldPushContent('modals'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
 <script>
</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\gerencia_convenios\resources\views/app.blade.php ENDPATH**/ ?>