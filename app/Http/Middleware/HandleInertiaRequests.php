<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $msg = "";
        $alertArry=['message', 'error', 'danger', 'warning', 'success', 'info'];
        foreach ( $alertArry as $alert) {
            if (Session::has($alert)) {
                $msg = $alert;
            }


        }

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user() ?  $request->user()->only('id', 'name', 'email') : null,
                //'can' =>  $request->user() ? $request->user()->listaPermissao() : [],
                 'admin' =>  $request->user() ? $request->user()->isSuperAdmin() : null,

                'loggedIn' => Auth::check(),
            ],
            'flash' => [
                'message' => fn () => $request->session()->get($msg),
                'alert' => fn () =>  $msg
            ],
        ]);
    }
}
