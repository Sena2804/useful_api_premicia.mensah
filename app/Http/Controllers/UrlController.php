<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function createShortUrl(Request $request){
        try {
            $request->validate([
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
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
