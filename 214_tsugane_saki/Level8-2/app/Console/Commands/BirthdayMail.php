<?php

namespace App\Console\Commands;

use App\Jobs\sendMail;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class BirthdayMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'send:birthday-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';
    protected $description = '誕生日のユーザーにメールを送信！！';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('birthday', '>=', 20200201)->get();
        var_dump($users);
        if (empty($users)) {
            Log::debug("誕生日ユーザーがいなければ終了");
            echo "誕生日ユーザーがいなければ終了";
            return 0;
    }
    foreach ($users as $value){
        //var_dump($value->name);
    }
    $users->map(fn(User $user) => SendMail::dispatch($user));
    Log::debug("プレゼント付与する処理がここで行われます。");
        var_dump("プレゼント付与する処理がここで行われます。");
        
        return Command::SUCCESS;
    }
}
