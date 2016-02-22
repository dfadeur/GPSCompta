<?php

namespace GPSCompta\Http\Controllers;

use GPSCompta\Client;
use GPSCompta\Http\Requests;
use GPSCompta\Facture;
use GPSCompta\Ligne;
use GPSCompta\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use DateTime;
class FactureController extends Controller
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
    public function index(Request $request)
    {
        $params = $request->except(['_token']);
        $factures = Facture::with('client', 'lignes')->where('status', "=", $params['status'])->where('type', "=", $params['type'])->orderBy('id','desc')->get();
        return view('factures.index', compact('factures', 'lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::lists('name', 'id');
        return view('factures.create', compact('facture', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $count = Facture::all()->count();
        if ($count>0):
            $last_id = Facture::select('id')->orderBy('id', 'desc')->take(1)->get();
        else:
            $last_id = 0;
        endif;
        $facture = new Facture();
        $params = $request->except(['_token']);
        $date = new \DateTime(null);
        if($params['type']=='vente' and $params['status']=='facture'):
            $facture->slug =strtoupper(Str::slug(substr($params['status'], 0, 1).'-'.$date->format('Ymd').'-'.($last_id[0]['id']+1)));
        elseif($params['reffacture']):
            $facture->slug =strtoupper(Str::slug(substr($params['status'], 0, 1).substr($params['type'], 0, 1).'-'.$params['reffacture']));
        else:
            $facture->slug =strtoupper(Str::slug(substr($params['status'], 0, 1).substr($params['type'], 0, 1).'-'.$date->format('Ymd').'-'.rand(10000,99999)));
        endif;
        $facture->description = $params['description'];
        $facture->client_id = $params['client_id'];
        $facture->type = $params['type'];
        $facture->status = $params['status'];
        $newfacture = Facture::create($facture->toArray());
        return redirect(route('factures.show', $newfacture->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $facture = Facture::with('client', 'lignes')->find($id);
        return view('factures.show', compact('facture', 'lignes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $facture = Facture::find($id);
        $clients = Client::lists('name', 'id');
        $lignes = Ligne::where('facture_id', $facture->id)->get();
        $produit = Produit::lists('name', 'id');
        return view('factures.edit', compact('facture', 'clients', 'lignes', 'produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $params = $request->except(['_token']);
        $facture = Facture::find($params['id']);
        if(array_key_exists('advance', $params)):
            $facture->advance = $params['advance'];
        endif;
        if(array_key_exists('status', $params)):
            $slug = explode("-", $facture->slug);
            $newslug = strtoupper(substr($params['status'], 0, 1)).'-'.$slug[1].'-'.$slug[2];
            $facture->slug = $newslug;
        endif;
        $facture->save();
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
        //
    }

    public function advance(Request $request)
    {
        //return $request;
        $params = $request->except(['_token']);
        $facture = Facture::find($params['id']);
        return view('factures.advance', compact('facture'));
    }
    public function salesbook()
    {
        $mois = DB::select( DB::raw("SELECT DISTINCT EXTRACT(MONTH FROM factures.updated_at) FROM factures"));
        $annee = DB::select( DB::raw("SELECT DISTINCT EXTRACT(YEAR FROM factures.updated_at) FROM factures"));
        $liste = array('Janvier', 'Février', 'Mars', 'Avril' , 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

        $result = array();
        foreach($mois as $month):
            $temp = intval($month->date_part) - 1;
            $result[$temp+1] = $liste[$temp];
        endforeach;
        $factures = Facture::with('client', 'lignes')->where('status', '=', 'facture')
            ->orderBy('updated_at','desc')
            ->get();
        return view('factures.salesbook', compact('factures', 'lignes', 'result', 'annee'));
    }

    public function buybook()
    {
        $mois = DB::select( DB::raw("SELECT DISTINCT EXTRACT(MONTH FROM factures.updated_at) FROM factures"));
        $annee = DB::select( DB::raw("SELECT DISTINCT EXTRACT(YEAR FROM factures.updated_at) FROM factures"));
        sort($annee);
        $annee = array_reverse($annee);
        $liste = array('Janvier', 'Février', 'Mars', 'Avril' , 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

        $result = array();
        foreach($mois as $month):
            $temp = intval($month->date_part) - 1;
            $result[$temp+1] = $liste[$temp];
        endforeach;
        $marchandises = Facture::with('client', 'lignes')->where('status', 'facture')->where('type', '=', 'achat marchandises')
            ->orderBy('updated_at','desc')
            ->get();

        $frais = Facture::with('client', 'lignes')->where('status', 'facture')->where('type', '=', 'frais')
            ->orderBy('updated_at','desc')
            ->get();

        $investissements = Facture::with('client', 'lignes')->where('status', 'facture')->where('type', '=', 'investissement')
            ->orderBy('updated_at','desc')
            ->get();

        return view('factures.buybook', compact('marchandises', 'frais', 'investissements', 'lignes', 'result', 'annee'));
    }
}
