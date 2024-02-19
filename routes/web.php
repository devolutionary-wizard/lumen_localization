<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function (\Illuminate\Http\Request $request) use ($router) {
    $lang = $request->input('lang', 'km');
    if (!in_array($lang, ['en', 'km'])) {
        $lang = 'en';
    }

    $messages = require_once(resource_path("lang/$lang/message.php"));


    return response()->json(['messages' => $messages]);

});
