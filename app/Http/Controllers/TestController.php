<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function sample (){

        return view("sample-view",[
            "name"=>"Ahmed Afifi",
            "email"=>"ahmedafifi1500@gmail.com"
        ]);

    }

}
