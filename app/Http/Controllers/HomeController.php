<?php

namespace GPSCompta\Http\Controllers;

use Illuminate\Http\Request;

use GPSCompta\Facture;
use GPSCompta\Client;
use GPSCompta\Produit;
use Illuminate\Support\Facades\App;
use Knp\Snappy\Pdf;


class HomeController extends Controller
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
    public function index(){
        $clients = Client::where('client', '=', true)->orderBy('id', 'desc')->take(5)->get();
        $suppliers = Client::where('supplier', '=', true)->orderBy('id', 'desc')->take(5)->get();
        $produits = Produit::orderBy('id', 'desc')->where('actif', true)->take(5)->get();
        $factures = Facture::where('status', '=', 'facture')->where('type', 'vente')->orderBy('id', 'desc')->with('client')->take(5)->get();
        $devis = Facture::where('status', '=', 'devis')->orderBy('id', 'desc')->with('client')->take(5)->get();
        return view('GPSCompta/home')->with('suppliers', $suppliers)->with('clients', $clients)->with('factures', $factures)->with('produits', $produits)->with('devis', $devis);
    }

    public function createPDF(Request $request)
    {
        $facture = Facture::with('client', 'lignes')->find($request["facture"]);

        /*return view('GPSCompta/factureToPDF', compact('facture', 'lignes'));*/
        $pdf = \PDF::loadView('GPSCompta.factureToPDF', compact('facture', 'lignes'));
        return $pdf->download('facture.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
