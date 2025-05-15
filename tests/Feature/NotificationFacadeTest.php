<?php

use UVI\Notification\UviNotificationService;

describe(\UVI\Notification\Facades\Notification::class, function () {
    it('should be defined', function () {
        expect(app(\UVI\Notification\Facades\Notification::class))->toBeInstanceOf(UviNotificationService::class);
    });
});
