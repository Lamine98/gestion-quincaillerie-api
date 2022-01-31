<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Validator;

class ArticleController extends Controller
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
        $data = Article::with('categorie')->get();

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
        $article = Article::create($this->validator());
        $this->storeImage($article);

        return response()->json([
            'message' => 'article successfully created',
            'article' => $article
        ], 201);
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
    public function updateArticle(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                    'intitule' => 'required|string|between:3,100',
                    'prix' => 'required|integer',
                    'quantite' => 'required|integer',
                    'photo' => 'image:jpeg,png,jpg|max:2048',
                    'categorie_id' => 'required|integer'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(["status"=>"false", "message"=>$error, "data"=>[]], 422);
            }
            else {
                $article = Article::find($id);
                $article->update($request->all());
                $this->storeImage($article);
            }

    
            return $article;
    
        } catch (\Exception $e) {
            return response()->json(["status"=>"false", "message"=>$e->getMessage(), "data"=>[]], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::FindOrFail($id);

        $article->delete();

        return response()->json($article, 200,);
    }

    public function validator()
    {
        return request()->validate([
                'intitule' => 'required|string|between:3,100',
                'prix' => 'required|integer',
                'quantite' => 'required|integer',
                'photo' => 'nullable|image:jpeg,png,jpg|max:2048',
                'categorie_id' => 'required|integer'
            ]);
    }


    private function storeImage(Article $article)
    {
        if (request('photo')) {
            $article->update([
                'photo' => request('photo')->store('images', 'public'),
            ]);
        }
    }

    public function nbArticleEnStock()
    {
        $data = Article::all()->count();

        return response()->json($data, 200);
    }

    public function valeurTotalStock()
    {
        $total = DB::table('articles')->sum(DB::raw('articles.quantite * articles.prix'));
       //select sum(articles.quantite * articles.prix) as aggregate from `articles`      []      4.43ms
       //$total = DB::table('articles')->sum('articles.quantite' * 'articles.prix');

       return response()->json($total, 200);
    }
}
