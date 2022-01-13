<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    //

    public function index(){
        // $data = [
        //     'url' => '',
        //     'short_url' => ''
        // ];

        return view('index');
        // return view('index', compact('data'));
    }

    public function post(Request $request){

        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->post('url');
        
        $random = Str::random(6);
        $request->merge([
            'short_url' => $random
        ]);
        $data = $request->all();
        $urls = ShortUrl::create($data);
        $shortUrl = $data['short_url'];
        $data['short_url'] = "http://127.0.0.1:8000/shortUrl/$shortUrl";
        
        return view('index', compact('data'))
                ->with('success', 'Your URL has been converted successfully!!');
    }

    public function redirect($code){
        $url = ShortUrl::where('short_url', '=', $code)->get();
        // dd($o_url[0]->url);
        return redirect()->away($url[0]->url);
    }
}
