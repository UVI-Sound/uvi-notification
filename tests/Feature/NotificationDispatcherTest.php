<?php

namespace UVI\Notification\Tests;

use UVI\Notification\Contracts\UviNotification;
use UVI\Notification\NotificationDispatcher;
use UVI\Notification\NotificationService;

describe( NotificationDispatcher::class, function () {
    it('may have a base notification', function () {
        $notification = new class implements UviNotification {};
        $dispatcher = new NotificationDispatcher();


        $dispatcher->send($notification);

        expect($dispatcher->getBaseNotification())->toBeInstanceOf(UviNotification::class);
    });
});

