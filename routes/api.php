<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::middleware(['jwt.auth'])->group(function () {
        Route::apiResources([
            '/data' => 'AngController',
            '/forum' => 'forumController',
            '/announcement' => 'AnnController',
            '/connection' => 'ConnectionController',
            '/program' => 'ProgramController',
            '/divisi' => 'DivisiController',
            '/csv' => 'CsvController',
            '/member' => 'MemberController',
            '/username' => 'UserController',
            '/candidate' => 'CandidateController',
            '/vote' => 'VoteController',
            '/ballot' => 'BallotController',
            '/team' => 'TeamController',
            '/detail' => 'DetailController',
            '/dateFilter' => 'DateFilter',
            '/page' => 'PageController',
        ]);
        Route::post('/data/{id}', 'AngController@update');
        Route::delete('/data/{id}', 'AngController@destroy');
        Route::post('/team/{id}', 'TeamController@updateNih');
        Route::delete('/forum/{id}', 'forumController@destroy');
        Route::post('/announcement', 'AnnController@store');
        Route::delete('/announcement/{id}', 'AnnController@destroy');
        Route::get('/comment/{id}', 'comController@show');
        Route::post('/comment', 'comController@store');
        Route::delete('/comment/{id}', 'comController@destroy');
    });

    Route::apiResources([
        '/login' => 'LoginController',
        '/regis' => 'RegisController',
    ]);
});