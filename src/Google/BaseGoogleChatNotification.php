<?php

declare(strict_types=1);

namespace UVI\Notification\Google;


use Illuminate\Support\Str;

abstract class BaseGoogleChatNotification implements GoogleChatNotification
{
    public function __construct(public string $title, public string $message, public string $space) {}

    public function title(): string
    {
        return $this->title;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function space(): string
    {
        return $this->space;
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        return [
            'cardsV2' => [
                'cardId' => Str::uuid7()->toString(),
                'card' => [
                    'header' => [
                        'title' => $this->title(),
                        'imageUrl' => 'https://developers.google.com/chat/images/quickstart-app-avatar.png',
                        'imageType' => 'CIRCLE',
                    ],
                    'sections' => [
                        'collapsible' => false,
                        'uncollapsibleWidgetsCount' => 1,
                        'widgets' => [
                            [
                                'textParagraph' => [
                                    'text' => $this->message(),
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
