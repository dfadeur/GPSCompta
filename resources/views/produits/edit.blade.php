@extends('../app')

@section('title')
    GPSCompta : <small>Modifier produit</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($produit, ['method' => 'put', 'url' => route('produits.update', $produit)]) !!}
            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("name", "Nom") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("name", null, array("class"=>"form-group col-lg-10")) !!}
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
                    {!! Form::label("buyprice", "Prix d'achat") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("buyprice", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("sellprice", "Prix de vente") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("sellprice", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("actif", "En vente ?") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::checkbox("actif", null, array("class"=>"form-group col-lg-10")) !!}
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
