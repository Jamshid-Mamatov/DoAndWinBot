<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetTelegramWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:set-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the Telegram webhook URL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $webhookUrl = env('TELEGRAM_WEBHOOK_URL');

        if (!$botToken || !$webhookUrl) {
            $this->error('Missing TELEGRAM_BOT_TOKEN or TELEGRAM_WEBHOOK_URL in .env');
            return 1;
        }

        // Build the setWebhook endpoint
        $apiUrl = "https://api.telegram.org/bot{$botToken}/setWebhook";

        // Send POST request to Telegram's setWebhook method
        $response = Http::post($apiUrl, [
            'url' => $webhookUrl,
            'drop_pending_updates' => true,
        ]);

        // Check response
        if ($response->ok() && $response->json('ok')) {
            $this->info('Telegram webhook set successfully!');
            return 0;
        } else {
            $this->error('Failed to set Telegram webhook.');
            $this->error($response->body());
            return 1;
        }
    }
}
