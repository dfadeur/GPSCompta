<?php

namespace GPSCompta\Http\Controllers;

use GPSCompta\Produit;
use Illuminate\Http\Request;

use GPSCompta\Http\Requests;
use GPSCompta\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProduitController extends Controller
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
        $produits = Produit::orderBy('name')->get();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $produit = new Produit();
        $params = $request->except(['_token']);
        $date = new \DateTime(null);
        $pin = mt_rand(10000000, 99999999);
        $produit->slug =strtoupper(Str::slug('P-'.$date->format('Ymd').'-'.$pin));
        $produit->name = $params['name'];
        $produit->description = $params['description'];
        $produit->buyprice = $params['buyprice'];
        $produit->sellprice = $params['sellprice'];
        //$produit->actif = $params['actif'];
        if(array_key_exists('actif',$params)):
            $produit->actif = 1;
        else:
            $produit->actif = 0;
        endif;

        $newproduit = Produit::create($produit->toArray());
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        if ($produit->actif):
            $produit->actif = false;
        else:
            $produit->actif = true;
        endif;
        $produit->update();
        return redirect(route('produits.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
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
        $produit = Produit::find($id);
        if($request->actif):
            $produit->actif = true;
        else:
            $produit->actif = false;
        endif;

        $produit->update($request->all());
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

    }
}
