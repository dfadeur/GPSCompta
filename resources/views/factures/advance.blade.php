@extends('../app')

@section('title')
    GPSCompta : <small>Acompte</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['url' => route('factures.update'), 'method' => 'put']) !!}

            <div class="form-group ">
                <div class="col-lg-2 col-lg-offset-2">
                    {!! Form::label("advance", "Montant de l'acompte") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-4">
                    {!! Form::number("advance", null, array("class"=>"form-group col-lg-4")) !!}
                </div>
            </div>

            <input type="hidden" name="id" value="{{ $facture->id }}">
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
