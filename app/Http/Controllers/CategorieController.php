<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Validator;

class CategorieController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth.role:admin');
    // } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categorie::all();

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'intitule' => 'required|string'
        ]);


        $categorie = Categorie::create($validator->validated());

        return response()->json([
            'message' => 'Categorie successfully registered',
            'categorie' => $categorie
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $categorie = Categorie::find($id);

        return response()->json($categorie, 200);
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
        
        $categorie = Categorie::find($id);
        $categorie->update($request->all());

        return $categorie;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

        return response()->json($categorie, 200);
    }

    public function nbArticleByCategorie($id)
    {
        $nb_article = Categorie::withCount('articles')->where('id', $id)->get();

        return response()->json($nb_article, 200);
    }

    public function getNombreCategorie()
    {
        $categorie = Categorie::count(); 
        return response()->json($categorie, 200);
    }
}
