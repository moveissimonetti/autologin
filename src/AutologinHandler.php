<?php

namespace Roomies\Autologin;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AutologinHandler
{
    /**
     * The authentication guard.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create the route handler.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the autologin request.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id, Request $request)
    {
        $this->auth->loginUsingId($id);

        return Redirect::to($request->input('path'));
    }
}
