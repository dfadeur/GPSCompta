@extends('../app')

@section('title')
    GPSCompta : <small>Nouvelle ligne</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['url' => route('lignes.store')]) !!}
            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("produit", "Produit", array("class"=>"form-group col-lg-2")) !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::select("produit_id", $produits,null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("quantity", "Quantité") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::number("quantity", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <input type="hidden" name="facture_id" value="{{ $facture->id }}">
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
