<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    /**
     * http://localhost:8000/dataInsert
     * で、データを作成する
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dataInsert(Request $request)
    {
        try {
            Artisan::call('testBatch:insertData');
            $msg = exec('/usr/bin/php artisan testBatch:insertData 2>&1', $output, $code );
            var_dump($output);
            var_dump($code);
            Log::debug($output);


            if ($code != 0) {
                throw new \Exception($msg);
            }

        } catch (\Exception $e) {
            Log::error(FILE . " (" . LINE . ")" . PHP_EOL . $e->getMessage());
       }

        return view('ApiTest.index');
    }
}
