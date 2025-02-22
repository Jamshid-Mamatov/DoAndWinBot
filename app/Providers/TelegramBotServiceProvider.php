<?php

namespace App\Providers;

use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\ServiceProvider;

class TelegramBotServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind a singleton of Nutgram to the container
        // $this->app->singleton(Nutgram::class, function () {
        //     $bot = new Nutgram(env('TELEGRAM_TOKEN'));

        //     // Register commands here
        //     $bot->onCommand('start', [\App\Services\TelegramBot\Commands\StartCommand::class, 'handle']);

        //     return $bot;
        // });
    }
}
