<?php

declare(strict_types=1);

namespace UVI\Notification;

use Illuminate\Support\ServiceProvider;
use UVI\Notification\Contracts\NotificationFactoryContract;
use UVI\Notification\Contracts\UviNotificationDispatcherContract;
use UVI\Notification\Facades\Notification;

final class UviNotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/uvi-notification.php' => config_path('uvi-notification.php'),
            ], 'uvi-notification:config');
        }

        $this->mergeConfigFrom(__DIR__.'/../config/uvi-notification.php', 'uvi-notification');
    }

    public function register(): void
    {
        $this->app->bind(NotificationFactoryContract::class, NotificationFactory::class);
        $this->app->bind(UviNotificationDispatcherContract::class, UviNotificationDispatcher::class);

        $this->app->alias(UviNotificationService::class, Notification::class);
    }
}
