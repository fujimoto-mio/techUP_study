<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendBirthdayMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday emails to users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 誕生日メール送信のロジックをここに記述する
        $this->info('Birthday emails sent successfully.');
    }
}
