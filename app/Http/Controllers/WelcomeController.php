<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie('bannerSeen')) {
            $showBanner = true; 
            $cookie = cookie()->forget('bannerSeen'); 
            return response()
                ->view('home', ['showBanner' => $showBanner])
                ->withCookie($cookie);
                
        } else {
            $showBanner = false;
            return view('home', ['showBanner' => $showBanner]);
        }
    }
    
    public function saveBannerCookie()
    {
			$cookie = cookie('bannerSeen', true, 1 * 24 *60 ); 
       // $cookie = cookie()->forget('bannerSeen');
        return redirect('/')->withCookie($cookie);
    }
}