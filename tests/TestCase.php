<?php

namespace Roomies\Autologin\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use MockeryPHPUnitIntegration;
}
