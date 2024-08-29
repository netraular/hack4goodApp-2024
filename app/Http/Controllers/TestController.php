<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class TestController extends Controller
{
    //
    public function jqueryTest(Request $request){
        return view('test/jquerytest');
    }
    

    public function alexTest(Request $request){
        return view('test/alexTest');
    }
    
    public function alexTest2(Request $request){
        //dd('hola');
        // dump($request->all()); 
        
        $coord_x = $request->coordX;
        $coord_y = $request->coordY;
        $process = new Process(['python3', app_path() . "/Scripts/alexScript.py", $coord_x, $coord_y]);
        $process->run();
    
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    
        $output = $process->getOutput();
        $result = trim($output); // Eliminar espacios en blanco alrededor del resultado

        return view('test/alexTest', compact('result'));
    }
}
