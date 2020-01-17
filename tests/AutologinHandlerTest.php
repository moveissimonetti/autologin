<?php

namespace Roomies\Autologin\Tests;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery;
use Roomies\Autologin\AutologinHandler;

class AutologinHandlerTest extends TestCase
{
    public function test_it_logs_in_and_redirects()
    {
        $auth = Mockery::mock(Guard::class);

        $auth->shouldReceive('loginUsingId')->with(1);

        Redirect::shouldReceive('to')
            ->with('/path')
            ->andReturn('/redirected');

        $handler = new AutologinHandler($auth);

        $result = $handler(1, new Request(['path' => '/path']));

        $this->assertEquals('/redirected', $result);
    }
}
