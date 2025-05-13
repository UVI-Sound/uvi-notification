<?php

namespace UVI\Notification\Tests\Google;

use UVI\Notification\Contracts\UviNotification;
use UVI\Notification\Google\BaseGoogleChatNotification;
use UVI\Notification\Google\GoogleChatNotification;

describe( BaseGoogleChatNotification::class, function () {
    test('it should implements '. UviNotification::class, function () {
        expect(BaseGoogleChatNotification::class)->toImplement(UviNotification::class);
    });

    test('it should implements '. GoogleChatNotification::class, function () {
        expect(BaseGoogleChatNotification::class)->toImplement(GoogleChatNotification::class);
    });
});

