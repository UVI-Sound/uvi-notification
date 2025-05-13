<?php

declare(strict_types=1);

namespace UVI\Notification\Tests;

use UVI\Notification\NotificationDispatcher;

describe( NotificationDispatcher::class, function () {
    it('should have a to method', function () {
        expect(NotificationDispatcher::class)->toHaveMethod('to');
    });
    it('should have a send method', function () {
        expect(NotificationDispatcher::class)->toHaveMethod('send');
    });
    it('may have a base notification', function () {
        expect(NotificationDispatcher::class)->toHaveMethod('getBaseNotification');
    });
});

