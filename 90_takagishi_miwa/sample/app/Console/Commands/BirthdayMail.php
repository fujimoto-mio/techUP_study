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
    protected $signature = 'send:birthday-mail';

    /**
     * The console command description.
     *
     * @var string
     */
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
        foreach ($users as $value){
            //var_dump($value->name);
        }


        // 取得したユーザーに対してメール送信（非同期で実行）
        $users->map(fn(User $user) => SendMail::dispatch($user));

        //  storage/logs/laravel.log にログが記載されます
        Log::debug("プレゼント付与する処理がここで行われます。");
        var_dump("プレゼント付与する処理がここで行われます。");
        /**  プレゼント付与する処理をいれる  **/

        return Command::SUCCESS;
    }

    public function up()
    {
        Schema::table('m_users', function (Blueprint $table) {
            $table->date('birthday')->after('remember_token');  //カラム追加
        });
    }

    /**
     * Reverse the migrations.
     *ここに処理を巻き戻す処理を書きます。
     * コマンド命令はは、「php artisan migrate:rollback --step=1」
     * @return void
     */
    public function down()
    {
        Schema::table('m_users', function (Blueprint $table) {
            $table->dropColumn('birthday');  //カラム削除
        });
    }
}
