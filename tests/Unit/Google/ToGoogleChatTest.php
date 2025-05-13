<?php

namespace UVI\Notification\Tests\Google;

use UVI\Notification\Google\ToGoogleChat;

describe( ToGoogleChat::class, function () {
    test('it should define a method toGoogleChat', function () {
        expect(ToGoogleChat::class)->toHaveMethod('toGoogleChat');
    });
});

