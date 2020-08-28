<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function set_locale(Request $request)
    {
        session()->put('lang',$request->locale);

        return response()->json([
            'success' => 0
        ]);
    }
}
