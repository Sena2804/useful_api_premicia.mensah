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
            /* $request->validate([
                'original_url' => 'required',
                'user_id' => 'required|exists:users,id'
            ]);

            $url = Url::where("original_url", $request->original_url)->first();

            if(!$url){
                $shortCode = Url::generateShortCode();
                $url = new Url();
                $url->original_url = $request->original_url;
                $url->code = $shortCode;
                $url->save();
            }

            return response()->json([
                "id" => $url->id,
                "user_id" => $url->user_id,
                'original_code' => $url->original_url,
                'code' => url('/') . '/' . $shortCode,
                'clicks' => $url->clicks,
                'created_at' => $url->created_at
            ], 201);

            */

            $request->validate([
                'original_url' => 'required|string',
            ]);


            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['original_url'] = $request->original_url;
            $data['code'] = Str::random(10);
            Url::create($data);

            return response()->json([/*
                "id" => $data['id'],
                "user_id" => $data['user_id'],
                'original_code' => $data['original_url'],
                'code' => $data['code'],
                'clicks' => $data['clicks'],
                'created_at' => $data['created_at'] */
                'data' => $data
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
