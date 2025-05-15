<?php

namespace UVI\Notification\Facades;

use Illuminate\Support\Facades\Facade;
use UVI\Notification\UviNotificationService;

class Notification extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return UviNotificationService::class;
    }
}
