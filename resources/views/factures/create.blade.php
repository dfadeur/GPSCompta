@extends('../app')

@section('title')
    GPSCompta :
    <small>Nouvelle facture</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['url' => route('factures.store')]) !!}

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("description", "Description") !!}
                </div>

                <div class="col-lg-10">
                    {!! Form::textarea("description", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("client", "Client", array("class"=>"form-group col-lg-2")) !!}
                </div>

                <div class="col-lg-10">
                    {!! Form::select("client_id", $clients,null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("reffacture", "Référence fournisseur", array("class"=>"form-group col-lg-2")) !!}
                </div>

                <div class="col-lg-10">
                    {!! Form::text("reffacture", null, array('placeholder'=>'n° de facture fournisseur', "class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <br>
            <div class="form-group ">
                <div class="col-lg-2 col-lg-offset-0">
                    {!! Form::label("type", "Type") !!}
                </div>

                <div class="col-lg-offset-4">
                    {!! Form::radio("type", "achat marchandises", false) !!} Achat marchandises
                </div>
                <div class="col-lg-offset-4">
                    {!! Form::radio("type", "frais", true) !!} Frais
                </div>
                <div class="col-lg-offset-4">
                    {!! Form::radio("type", "investissement", true) !!} Investissement
                </div>
                <div class="col-lg-offset-4">
                    {!! Form::radio("type", "vente", true) !!} Vente
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2 col-lg-offset-2">
                    {!! Form::label("status", "Status", array("class"=>"form-group col-lg-2")) !!}
                </div>

                <div class="col-lg-offset-4">
                    {!! Form::radio("status", "brouillon", false) !!} Brouillon
                </div>

                <div class="col-lg-offset-4">
                    {!! Form::radio("status", "devis", true) !!} Devis
                </div>

                <div class="col-lg-offset-4">
                    {!! Form::radio("status", "facture", true) !!} Facture
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::submit("Valider", array("class"=>"btn btn-info")) !!}

                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
