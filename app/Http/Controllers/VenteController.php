<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\operationApprovisionnements;
use App\Models\Operation;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'livreur_id' => 'integer' ?? null,
            'adresse_livraison' => 'string' ?? null,
            'date_livraison' => 'date' ?? null,
            'etat_livraison' => 'string' ?? null,
            'type' => 'required|string',
            'client_id' => 'integer'  ?? null,
            'construction_id' => 'integer'  ?? null,
        ]);

        $validator_op = $request->validate([
            'article_id' => 'required|integer',
            'quantite' => 'required|integer',
        ]);
        
        $article_update = Article::find($validator_op['article_id']);

        if ($article_update->quantite < $validator_op['quantite']) {
            $error = "la quantite est insuffisante";
            return response()->json(["status"=>"false", "message"=>$error, "data"=>[]], 422);
        }
        $data = Operation::create($validator);
    
        $article = new Article();
        $article->quantite = $validator_op['quantite'];
        $article->id = $validator_op['article_id'];

        $data->articles()->attach($article, ['quantite'=> $article->quantite]);

        $attribute = $article_update->where('id', $article->id)->first();

        $attribute->quantite = $attribute->quantite - $article->quantite;
        
        $attribute->save();
       return response()->json($data, 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
