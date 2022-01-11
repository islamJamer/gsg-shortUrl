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
        $data = [
            'url' => '',
            'short_url' => ''
        ];

        return view('index', compact('data'));
    }

    public function post(Request $request){
        $url = $request->post('url');
        
        $random = Str::random(6);
        $request->merge([
            'short_url' => $random
        ]);
        $data = $request->all();
        $urls = ShortUrl::create($data);
        $shortUrl = $data['short_url'];
        $data['short_url'] = "http://127.0.0.1:8000/shortUrl/$shortUrl";
        
        // return redirect(route('shortUrl.index'), compact('data'));
        return view('index', compact('data'));
    }

    public function redirect($id){
        $o_url = ShortUrl::where('short_url', '=', $id)->get();
        // dd($o_url[0]->url);
        return redirect()->away($o_url[0]->url);
    }
}
