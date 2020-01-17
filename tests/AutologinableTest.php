<?php

namespace Roomies\Autologin\Tests;

use Mockery;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Roomies\Autologin\Autologinable;

class AutologinableTest extends TestCase
{
    public function test_it_returns_autologin_link()
    {
        $autologinable = new AutologinableStub;

        URL::shouldReceive('temporarySignedRoute')
            ->with('autologin', Mockery::type(Carbon::class), ['id' => 1, 'path' => '/'])
            ->andReturn('link');

        $result = $autologinable->autologinLink();

        $this->assertEquals('link', $result);
    }

    public function test_it_returns_autologin_link_with_custom_path()
    {
        $autologinable = new AutologinableStub;

        URL::shouldReceive('temporarySignedRoute')
            ->with('autologin', Mockery::type(Carbon::class), ['id' => 1, 'path' => '/home'])
            ->andReturn('link');

        $result = $autologinable->autologinLink('/home');

        $this->assertEquals('link', $result);
    }
}

class AutologinableStub
{
    use Autologinable;

    public function getKey()
    {
        return 1;
    }
}
