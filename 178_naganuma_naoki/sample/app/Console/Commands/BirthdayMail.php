<?php

namespace App\Console\Commands;

use App\Jobs\sendMail;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Console\Command;

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
    //protected $signature = 'command:name';
    protected $signature = 'send:birthday-mail';

    /**
     * コンソールコマンドの説明
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
     * コンソールコマンドの実行する場所
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('BirthdayMail command started');
        // タスク実行の日付が誕生日のユーザーを取得
        //$users = User::where('birthday', '>=', 20200201)->get();
        $today = today()->format('Y-m-d');
        $users = User::where('birthday',  $today)->get();
        //var_dump($users);
        // 誕生日ユーザーがいなければ終了
        //if (empty($users)) {
        if ($users->isEmpty()) {
           // Log::info('No users found for today\'s birthday');
            Log::debug("誕生日ユーザーがいなければ終了");
            echo "誕生日ユーザーがいなければ終了";
            return 0;
        }
        //配列でなく、オブジェクト型で表示を確認します
        //foreach ($users as $value) {
            foreach ($users as $user) {
            //var_dump($value->name);
            SendMail::dispatch($user);
        }

            // 取得したユーザーに対してメール送信（非同期で実行）
            $users->map(fn(User $user) => SendMail::dispatch($user));

            //  storage/logs/laravel.log にログが記載されます
         //   Log::debug("プレゼント付与する処理がここで行われます。");
          // var_dump("プレゼント付与する処理がここで行われます。");
            /**  プレゼント付与する処理をいれる  **/
            Log::info('BirthdayMail command finished');
            return Command::SUCCESS;
        }
    }
