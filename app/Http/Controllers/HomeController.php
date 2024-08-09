<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
     public function home(Request $request)
     {
         if (!$request->cookie('bannerSeen')) {
             $showBanner = true; 
             $cookie = cookie('bannerSeen', true, 60 * 24 * 30); // Set the cookie for 30 days
             return response()->view('general.home', ['showBanner' => $showBanner])->withCookie($cookie);

         } else {
             $showBanner = false;
             return view('general/home', ['showBanner' => $showBanner]);
         }
     }
     
     public function saveBannerCookie()
     {
             $cookie = cookie('bannerSeen', true, 1 * 24 *60 ); 
        // $cookie = cookie()->forget('bannerSeen');
         return redirect('/')->withCookie($cookie);
     }
     public function homeEmpresa()
     {
         return view('general/home_empresa');
     }
     public function aboutUs()
     {
         return view('general/about-us');
     }
     public function hack4good()
     {
         return view('general/hack4good');
     }
}
