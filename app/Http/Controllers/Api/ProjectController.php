<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// uso il model corretto
use App\Models\Project;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // importo la lista dei projects
        $projects = Project::select("id", "type_id", "name", "slug", "description")
            //* il with serve a collegare le tabelle che ci interessano di cui abbiamo già creato le relazioni
            // ->with('type', 'tecnologies')
            //* come segue invece scelgo anche i campi che mi interessa ricevere
            ->with('type:id,label,color', 'tecnologies:id,label,color')
            ->paginate(5);

        // la risposta di questa chiamata è un file json
        return response()->json([
            "projects" => $projects
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $project = Project::find($id);
        $project = Project::select("id", "type_id", "name", "slug", "description")
            ->with('type:id,label,color', 'tecnologies:id,label,color')
            ->where('id', '=', $id)
            ->get();
        return $project;
        // todo - collegare il metodo show di api   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}