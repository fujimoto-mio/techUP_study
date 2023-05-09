<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ApiSample extends Controller
{
    public function apiHello(){
        return 'Hello API!!';
    }

    

}
