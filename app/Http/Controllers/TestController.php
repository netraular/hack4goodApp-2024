<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function jqueryTest(Request $request){
        return view('test/jquerytest');
    }
}
