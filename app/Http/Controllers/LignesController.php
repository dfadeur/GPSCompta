<?php

namespace GPSCompta\Http\Controllers;

use GPSCompta\Ligne;
use Illuminate\Http\Request;

use GPSCompta\Http\Requests;
use GPSCompta\Http\Controllers\Controller;
use GPSCompta\Produit;
use GPSCompta\Facture;
use Illuminate\Support\Str;

class LignesController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $lignes = Ligne::with('facture', 'produit')->get();
        return view('lignes.index', compact('lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $params = $request->except(['_token']);
        $produits = Produit::lists('name', 'id');
        $facture = Facture::findOrNew($params['id']);
        return view('lignes.create', compact('lignes', 'produits', 'facture'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ligne = new Ligne();
        $params = $request->except(['_token']);
        $date = new \DateTime(null);
        $pin = mt_rand(10000000, 99999999);
        $ligne->slug =strtoupper(Str::slug('L-'.$date->format('Ymd').'-'.$pin));
        $ligne->quantity = $params['quantity'];
        $ligne->produit_id = $params['produit_id'];
        $ligne->facture_id = $params['facture_id'];
        $newligne = Ligne::create($ligne->toArray());
        return redirect(route('factures.show', ['id'=>$ligne->facture_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*$ligne = Ligne::find($id);
        $facture_id = $ligne->facture_id;
        $ligne->delete();
        return redirect(route('factures.show', ['id'=>$facture_id]));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $ligne = Ligne::find($id);
        $produits = Produit::lists('name', 'id');
        $facture = Facture::findOrNew($ligne->facture_id);
        return view('lignes.edit', compact('ligne', 'produits', 'facture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->except(['_token']);
        $ligne = Ligne::find($params['ligne_id']);
        $ligne->quantity = $params['quantity'];
        $ligne->produit_id = $params['produit_id'];
        $ligne->facture_id = $params['facture_id'];
        $ligne->update($request->all());
        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        dd(Request::$id);
        $ligne = Ligne::find($id);
        $facture_id = $ligne->facture_id;
        $ligne->delete();
        return redirect(route('factures.show', ['id'=>$facture_id]));
    }
}
