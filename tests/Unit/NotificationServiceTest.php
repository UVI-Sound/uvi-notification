<?php

namespace UVI\Notification\Tests;

use UVI\Notification\UviNotificationService;

describe(UviNotificationService::class, function () {
    it('should have a send method', function () {
        expect(UviNotificationService::class)->toHaveMethod('send');
    });
});
