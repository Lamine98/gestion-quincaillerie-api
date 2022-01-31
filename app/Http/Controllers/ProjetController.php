<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Projet;
use Illuminate\Auth\AuthManager;

class ProjetController extends Controller
{
    // /**
    // * @var AuthManager;
    // */
    // private $auth;

    // public function __construct(AuthManager $auth)
    // {
    //     $this->middleware('auth:api');
    //     $this->auth = $auth;
    // }

    public function __construct()
    {
        $this->middleware('auth.role:client');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::with('clients')->where('client_id', auth()->user()->id)->get();

        return response()->json($projets, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projet = new Projet();
        $projet->etat = $request->get('etat');
        $projet->adresse  = $request->get('adresse');
        $projet->date_demarrage  = $request->get('date_demarrage');

        
        $projet->client()->associate(auth()->user()->id);
        $projet->save();

        //$projet = Projet::create($validator->validated());
        
        return response()->json([
            'message' => 'Projet successfully created',
            'projet' => $projet
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
}
