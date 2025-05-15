<?php

declare(strict_types=1);

namespace UVI\Notification\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use UVI\Notification\UviNotificationServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UviNotificationServiceProvider::class,
        ];
    }
}
