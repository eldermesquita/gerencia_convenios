@php
$paginaLogin = Route::is('login');

@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Fiscalização Coordenada TCERR </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @vite(['resources/js/app.js','resources/sass/app.scss','resources/css/app.css'])
       {{-- @vite('resources/js/app.js') --}}
    <!-- Scripts -->
    {{--Importa o arquivo Ziggy gerado pelo Laravel--}}
    @routes
    @inertiaHead
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div id="app">
        <div class="wrapper">
                    @if (!$paginaLogin)
                    @include('layouts.nav')
                    @endif
            <div class="main">

                @if (!$paginaLogin)
                    @include('layouts.sidebar')
                @endif

                <main class="content">
                    @inertia
                  {{--   @yield('content') --}}
                </main>
            </div>
            @include('layouts.footer')
        </div>
        <div class="settings js-settings">
            <div class="settings-toggle js-settings-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders align-middle"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
            </div>

            <div class="settings-panel">
              <div class="settings-content">
                <div class="settings-title d-flex align-items-center">
                  <button type="button" class="btn-close float-right js-settings-toggle" aria-label="Close"></button>

                  <h4 class="mb-0 ms-2 d-inline-block">Explore AdminKit <sup><small class="badge bg-primary text-uppercase">Pro</small></sup></h4>
                </div>

                <div class="settings-body">

                  <div class="alert alert-primary" role="alert">
                    <div class="alert-message">
                      <strong>Hey there!</strong> Choose the color scheme, sidebar and layout that best fits your project needs.
                    </div>
                  </div>

                  <div class="mb-3">
                    <span class="d-block fw-bold">Color scheme</span>
                    <span class="d-block text-muted mb-2">The perfect color mode for your app.</span>
                    <div class="row g-0 text-center mx-n1 mb-2">
                      <div class="col">
                        <label class="mx-1 d-block mb-1">
                          <input class="settings-scheme-label" type="radio" name="theme" value="default">
                          <div class="settings-scheme">
                            <div class="settings-scheme-theme settings-scheme-theme-default"></div>
                          </div>
                        </label>
                        Default
                      </div>
                      <div class="col">
                        <label class="mx-1 d-block mb-1">
                          <input class="settings-scheme-label" type="radio" name="theme" value="colored">
                          <div class="settings-scheme">
                            <div class="settings-scheme-theme settings-scheme-theme-colored"></div>
                          </div>
                        </label>
                        Colored
                      </div>
                    </div>
                    <div class="row g-0 text-center mx-n1">
                      <div class="col">
                        <label class="mx-1 d-block mb-1">
                          <input class="settings-scheme-label" type="radio" name="theme" value="dark">
                          <div class="settings-scheme">
                            <div class="settings-scheme-theme settings-scheme-theme-dark"></div>
                          </div>
                        </label>
                        Dark
                      </div>
                      <div class="col">
                        <label class="mx-1 d-block mb-1">
                          <input class="settings-scheme-label" type="radio" name="theme" value="light">
                          <div class="settings-scheme">
                            <div class="settings-scheme-theme settings-scheme-theme-light"></div>
                          </div>
                        </label>
                        Light
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="mb-3">
                    <span class="d-block fw-bold">Sidebar layout</span>
                    <span class="d-block text-muted mb-2">Change the layout of the sidebar.</span>
                    <div>
                      <label>
                        <input class="settings-button-label" type="radio" name="sidebarLayout" value="default">
                        <div class="settings-button">
                          Default
                        </div>
                      </label>
                      <label>
                        <input class="settings-button-label" type="radio" name="sidebarLayout" value="compact">
                        <div class="settings-button">
                          Compact
                        </div>
                      </label>
                    </div>
                  </div>

                  <hr>

                  <div class="mb-3">
                    <span class="d-block fw-bold">Sidebar position</span>
                    <span class="d-block text-muted mb-2">Toggle the position of the sidebar.</span>
                    <div>
                      <label>
                        <input class="settings-button-label" type="radio" name="sidebarPosition" value="left">
                        <div class="settings-button">
                          Left
                        </div>
                      </label>
                      <label>
                        <input class="settings-button-label" type="radio" name="sidebarPosition" value="right">
                        <div class="settings-button">
                          Right
                        </div>
                      </label>
                    </div>
                  </div>

                  <hr>

                  <div class="mb-3">
                    <span class="d-block fw-bold">Layout</span>
                    <span class="d-block text-muted mb-2">Toggle container layout system.</span>
                    <div>
                      <label>
                        <input class="settings-button-label" type="radio" name="layout" value="fluid">
                        <div class="settings-button">
                          Fluid
                        </div>
                      </label>
                      <label>
                        <input class="settings-button-label" type="radio" name="layout" value="boxed">
                        <div class="settings-button">
                          Boxed
                        </div>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="settings-footer">
                  <div class="d-grid">
                    <a class="btn btn-primary btn-lg btn-block" href="https://adminkit.io/pricing/" target="_blank">Get AdminKit PRO</a>
                  </div>
                </div>

              </div>
            </div>
          </div>
    </div>
    @stack('modals')
    @stack('scripts')
    <script>

  document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script>


</body>

</html>
