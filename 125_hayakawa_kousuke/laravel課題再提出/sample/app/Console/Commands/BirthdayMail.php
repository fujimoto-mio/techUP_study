<?php

namespace App\Console\Commands;

use App\Jobs\sendMail;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Contracts\Container\Container;
use App\Http\Controllers\ApiTestController;

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
    protected $description = '誕生日のユーザーにメール送信！！';

    protected $container;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Container $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = $this->container->make(ApiTestController::class);
        $controller->dateInsert();

        if(empty($users)){
            Log::debug("誕生日ユーザーがいなければ終了");
            echo "誕生日ユーザーがいなければ終了";
            return 0;
        }
        foreach($users as $value){
        }

        $users->map(fn(User $user)=>SendMail::dispatch($user));

        Log::debug("プレゼント付与する処理がここで行われます。");
        var_dump("プレゼント付与する処理がここで行われます。");

        return Command::SUCCESS;
    }
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->after('remember_token');  //カラム追加
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');  //カラム削除
        });
    }
}
