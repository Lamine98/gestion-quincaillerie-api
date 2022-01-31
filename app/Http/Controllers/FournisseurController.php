<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Validator;
class FournisseurController extends Controller
{
    /**
    * @var AuthManager;
    */
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->middleware('auth:api');
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fournisseur::all();

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
            'prenom' => 'required|string|between:2,100',
            'nom' => 'required|string|between:2,100',
            'telephone' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }


        $fournisseur = Fournisseur::create($validator->validated());

        return response()->json([
            'message' => 'Fournisseur ajouté',
            'fournisseur' => $fournisseur
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

    public function nbFournisseur()
    {
        $data = Fournisseur::count();

        return response()->json($data, 200);
    }
}
