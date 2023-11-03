<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// importo i model di cui avrò bisogno
use App\Models\Project;

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
Route::get("/projects", function () {

    // importo la lista dei projects
    $projects = Project::all();

    // la risposta di questa chiamata è un file json
    return response()->json([
        "projects" => $projects
    ]);
});