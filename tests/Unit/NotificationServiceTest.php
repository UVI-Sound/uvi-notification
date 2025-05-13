<?php

namespace UVI\Notification\Tests;

use UVI\Notification\NotificationService;

describe( NotificationService::class, function () {
    it('should have a send method', function () {
        expect(NotificationService::class)->toHaveMethod('send');
    });
});

