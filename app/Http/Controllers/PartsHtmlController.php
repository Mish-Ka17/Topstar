<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartsHtmlController extends Controller
{
    public function getAuthViews(Request $request) {
        $component_name = $request->context == 'registration'
            ? 'components.authmanager.registration'
            : 'components.authmanager.login';

        $html = view($component_name)->render();

        return response()->json(['html' => $html]);
    }
}
