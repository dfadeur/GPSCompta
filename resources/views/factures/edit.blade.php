@extends('../app')

@section('title')
    GPSCompta :
    <small>Modifier facture</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($facture, ['method' => 'put', 'url' => route('factures.update', $facture)]) !!}
            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("client", "Client", array("class"=>"form-group col-lg-2")) !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::select("client_id", $clients, null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("description", "Description") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("description", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>


            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("type", "type", array("class"=>"form-group col-lg-2")) !!}
                </div>

                <div class="col-lg-10">
                    {!! Form::radio("type", "achat marchandises", null) !!} Achat marchandises
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::radio("type", "frais", null) !!} Frais
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::radio("type", "investissement", null) !!} Investissement
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::radio("type", "vente", null) !!} Vente
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("status", "status", array("class"=>"form-group col-lg-2")) !!}
                </div>

                <div class="col-lg-10">
                    {!! Form::radio("status", "brouillon", null) !!} Brouillon
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::radio("status", "devis", null) !!} Devis
                </div>

                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::radio("status", "facture", null) !!} Facture
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $facture->id }}">

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::submit("Valider", array("class"=>"btn btn-info")) !!}

                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
