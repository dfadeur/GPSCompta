<?php

namespace GPSCompta\Http\Controllers;

use GPSCompta\Client;
use Illuminate\Http\Request;

use GPSCompta\Http\Requests;
use GPSCompta\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Client::orderBy('name')->with('factures')->get();
        return view('clients.index', compact('clients', 'factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ClientRequest $request)
    {
        $client = new Client();
        $params = $request->except(['_token']);
        $date = new \DateTime(null);
        $pin = mt_rand(10000000, 99999999);
        $client->slug =strtoupper(Str::slug('C-'.$date->format('Ymd').'-'.$pin));
        $client->name = $params['name']?$params['name']:"";
        $client->secondname = $params['secondname']?$params['secondname']:"";
        $client->zip = $params['zip']?$params['zip']:"";
        /*$client->city = $params['city']?$params['city']:"";
        $client->adress = $params['adress'];
        $client->mobile = $params['mobile'];
        $client->phone = $params['phone'];
        $client->mail = $params['mail'];*/
        if(array_key_exists('client',$params)):
            $client->client = 1;
        else:
            $client->client = 0;
        endif;
        if(array_key_exists('supplier',$params)):
            $client->supplier = 1;
        else:
            $client->supplier = 0;
        endif;
        $newclient = Client::create($client->toArray());
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
        $client = Client::with('factures')->get($id)->first();
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
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

        $client = Client::find($id);
        if($request->client):
            $client->client = 1;
        else:
            $client->client = 0;
        endif;
        if($request->supplier):
            $client->supplier = 1;
        else:
            $client->supplier = 0;
        endif;
        $client->update();
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
}
