<?php

declare(strict_types=1);

namespace UVI\Notification\Tests;

use UVI\Notification\UviNotificationDispatcher;

describe(UviNotificationDispatcher::class, function () {
    it('should have a to method', function () {
        expect(UviNotificationDispatcher::class)->toHaveMethod('to');
    });
    it('should have a send method', function () {
        expect(UviNotificationDispatcher::class)->toHaveMethod('send');
    });
    it('may have a base notification', function () {
        expect(UviNotificationDispatcher::class)->toHaveMethod('getBaseNotification');
    });
});
