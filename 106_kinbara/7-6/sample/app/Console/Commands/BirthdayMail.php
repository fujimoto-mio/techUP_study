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
     * これを実行するとhandle()が実行される
     * @var string
     */
    protected $signature = 'send:birthday-mail';

    /**
     * コンソールコマンドの説明
     * The console command description.
     *
     * @var string
     */
    protected $description = '誕生日のユーザーにメールを送信';

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
        //タスク実行の日付が誕生日のユーザーを取得
        $users = User::where('birthday','>=',20200201)->get();
        //var dump($users);
        //誕生日のユーザーがいなければ終了
        //empty→中身が空かの確認 debag→正しく機能しているかの確認
        //return 0;→プログラムが正常に終了したことを示す一般的な慣習
        if(empty($users)){
            Log::debug("誕生日ユーザーがいなければ終了");
            echo "誕生日ユーザーがいなければ終了";
            return 0;
        }
        //配列でなく、オブジェクト型で表示を確認
        //foreach文は、配列の値を取り出し、それを変数に代入するだけ
        //繰り返し文
        foreach($users as $value){
            //var_dump($value->name);
        }

        //取得したユーザーに対してメール送信（非同期で実行）
        //mapメソッドは、各要素にコールバック関数に書いた処理を加えて、値に変更が加わった新しいCollectionを生成
        $users->map(fn(User $user) => SendMail::dispatch($user));

        //storage/logs/laravel.logにログが記載される
        Log::debug("プレゼント付与する処理がここで行われます。");
        var_dump("プレゼント付与する処理がここで行われます。");
        /**プレゼント付与する処理を入れる */

        return Command::SUCCESS;
    }
}
