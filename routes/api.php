<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/', function (Request $request) {
    return response()->json([
        'slackUsername' => 'Ifara Josh',
        'backend' => true,
        'age' => 26,
        'bio' => 'I am passionate about web technologies'
    ]);
});

Route::post('/calculate', function(Request $request){
    $op = $request->operation_type;
    $x = $request->x;
    $y = $request->y;
    $result = null;
    $output_op = '';

    if($op == '+' || str_contains(strtolower($op), 'add') === true){
        $result = $x + $y;
        $output_op = 'addition';
    }

    if($op == '-' || str_contains(strtolower($op), 'sub') === true){
        $result = $x - $y;
        $output_op = 'subtraction';
    }

    if($op == '*' || strtolower($op) == 'x'|| str_contains(strtolower($op), 'mul') === true){
        $result = $x * $y;
        $output_op = 'multiplication';
    }

    return response()->json([
        'slackUsername' => 'Ifara Josh',
        'result' => $result,
        'operation_type' => $output_op
    ]);
});
