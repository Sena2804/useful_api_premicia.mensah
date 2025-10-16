<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function createShortUrl(Request $request){
        try {
            $request->validate([
                'original_url' => 'required|string',
            ]);


            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['original_url'] = $request->original_url;
            $data['custom_code'] = Str::random(10);
            $url = Url::create($data);

            return response()->json([
                "id" => $url->id,
                "user_id" => $data['user_id'],
                'original_code' => $data['original_url'],
                'code' => $data['custom_code'],
                'clicks' => $url->clicks?null:0,
                'created_at' => $url->created_at
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
