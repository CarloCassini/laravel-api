<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// importo i model di cui avrò bisogno
use App\Models\Project;

// importo il controller per la gesione dell'api
use App\Http\Controllers\Api\ProjectController;

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

//** la seguente rotta è per utenti autenticati. siccome stiamo gestendo in backoffice le operazioni di modifica  */
//** non la useremo. se volessimo gestire le CRUD in Vue allora ci penseremmo */
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//** scrivo la rotta per gestire la API */
// Route::get("/projects", [ProjectController::class, "index"]);
//** usando api resource */
Route::apiResource("projects", ProjectController::class)->only(["index", "show"]);

// sono arrivato al minuto 00:36 della lezione 83A