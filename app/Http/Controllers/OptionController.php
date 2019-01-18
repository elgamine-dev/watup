<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class OptionController extends Controller
{
    public function post(Request $request) {
        $option = new Option;
        $option->key = $request->input('key');
        $option->value = $request->input('value');
        $option->save();
        return back();
    }

    public function put(Request $request) {
        $option = Option::findOrFail($request->input('id'));
        $option->value = $request->input('value');
        $option->save();
        return back();
    }
}
