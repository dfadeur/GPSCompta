@extends('../app')

@section('title')
    GPSCompta : <small>Nouveau client</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['url' => route('clients.store')]) !!}
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
                    {!! Form::label("secondname", "Prénom") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("secondname", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div class="col-lg-2">
                    {!! Form::label("zip", "Code Postal") !!}
                </div>
            </div>
            <div class="form-group ">
                <div class="col-lg-10">
                    {!! Form::text("zip", null, array("class"=>"form-group col-lg-10")) !!}
                </div>
            </div>
            <div class="form-group ">
                <div>
                    {!! Form::label("client", "Client", array("class"=>"form-group col-lg-1  col-lg-offset-2")) !!}
                </div>
            </div>
            <div class="form-group ">
                <div>
                    {!! Form::checkbox("client", null, array("class"=>"form-group col-lg-1")) !!}
                </div>
            </div>

            <div class="form-group ">
                <div>
                    {!! Form::label("supplier", "Fournisseur", array("class"=>"form-group col-lg-1  col-lg-offset-2")) !!}
                </div>
            </div>
            <div class="form-group ">
                <div>
                    {!! Form::checkbox("supplier", null, array("class"=>"form-group col-lg-1")) !!}
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
