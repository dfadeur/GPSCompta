@extends('../app')

@section('title')
    GPSCompta :
    <small>Supprimer ligne</small>
@endsection

@section('content')
    <div class="col-lg-12">
            <div class="row">
                <table class="table table-striped table-hover table-condensed ">
                    <thead>
                    <tr>
                        <th class="col-lg-5">Produit</th>
                        <th class="col-lg-1">Prix unitaire</th>
                        <th class="col-lg-1">Quantité</th>
                        <th class="col-lg-1">Total</th>
                        <th class="col-lg-1"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <small>{{ $lignes->produit->name }}</small>
                            </td>
                            <td>
                                <small>{{ $lignes->produit->sellprice }}</small>
                            </td>
                            <td>
                                <small>{{ $lignes->quantity }}</small>
                            </td>
                            <td>
                                <small>{{  $lignes->produit->sellprice*$ligne->quantity }}</small>
                            </td>
                            <td>
                                <a class="col-lg-1" href="{{ route('lignes.show', ['id'=>$ligne->id]) }}"
                                   class="text-right">{!! Collective\Html\HtmlFacade::image('img/delete.png','Delete', array( 'title'=>'delete', 'width' => 24, 'height' => 24 )) !!}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        {!! Form::open(['url' => route('lignes.create'), 'method' => 'get']) !!}
        <input type="hidden" name="id" value="{{ $facture->id }}">

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit("Ajouter ligne", array("class"=>"btn btn-info")) !!}

            </div>
        </div>
        {!! Form::close() !!}
    <
@endsection