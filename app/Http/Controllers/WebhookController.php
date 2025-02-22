<?php

namespace App\Http\Controllers;

use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    public function __invoke(Nutgram $bot)
    {
        // Pass the update to Nutgram so it can handle commands, messages, etc.
        $bot->run();
    }
}

