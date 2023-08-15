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
     * コンソールコマンドの名前と引数、オプション
     *
     * php artisan send:birthday-mail
     * これを実行するとhandle()　が実行されます。
     * @var string
     */
    //以下に書き換えます
    //protected $signature = 'command:name';
    protected $signature = 'send:birthday-mail';

    /**
     * コンソールコマンドの説明
     * The console command description.
     *
     * @var string
     */
    //以下に書き換えます
    //protected $description = 'Command description';
    protected $description = '誕生日のユーザーにメールを送信！！';


    /**
     * コンソールコマンドの実行する場所
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // タスク実行の日付が誕生日のユーザーを取得
        $users = User::where('birthday', '>=', 20200201)->get();
        //var_dump($users);
        // 誕生日ユーザーがいなければ終了
        if (empty($users)) {
            Log::debug("誕生日ユーザーがいなければ終了");
            echo "誕生日ユーザーがいなければ終了";
            return 0;
        }
        //配列でなく、オブジェクト型で表示を確認します
        foreach ($users as $value) {
            //var_dump($value->name);
        }


        // 取得したユーザーに対してメール送信（非同期で実行）
        $users->map(fn (User $user) => SendMail::dispatch($user));

        //  storage/logs/laravel.log にログが記載されます
        Log::debug("プレゼント付与する処理がここで行われます。");
        var_dump("プレゼント付与する処理がここで行われます。");
        /**  プレゼント付与する処理をいれる  **/

        return Command::SUCCESS;
    }
    
}
