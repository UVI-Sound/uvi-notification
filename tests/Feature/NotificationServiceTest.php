<?php

namespace UVI\Notification\Tests;

use UVI\Notification\Contracts\UviNotification;
use UVI\Notification\NotificationDispatcher;
use UVI\Notification\NotificationService;

describe( NotificationService::class, function () {

    beforeEach( function () {
        $this->service = new NotificationService();
    });

    test('sending a notification should return a '. NotificationDispatcher::class, function () {
        $sender = $this->service->send(new class implements UviNotification {});

        expect($sender)->toBeInstanceOf(NotificationDispatcher::class);
    });
});

