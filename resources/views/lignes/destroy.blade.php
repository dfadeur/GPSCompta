@extends('../app')

@section('title')
    GPSCompta :
    <small>Factures</small>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <h3><a href="{{ route('factures.edit', ['id'=>$facture->id]) }}">{{ $facture->slug }}</a></h3>
            {{ $facture->client->name }} {{ $facture->client->secondname }} : {{ $facture->description }}
        </div>
        @if(count($facture->lignes) != 0)
            <div class="col-lg-10 col-lg-offset-2">
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
                        @foreach($facture->lignes as $ligne)
                            <tr>
                                <td>
                                    <small>{{ $ligne->produit->name }}</small>
                                </td>
                                <td>
                                    <small>{{ $ligne->produit->sellprice }}</small>
                                </td>
                                <td>
                                    <small>{{ $ligne->quantity }}</small>
                                </td>
                                <td>
                                    <small>{{  $ligne->produit->sellprice*$ligne->quantity }}</small>
                                </td>
                                <td>
                                    <a class="col-lg-1" href="{{ route('lignes.destroy', ['id'=>$ligne->id]) }}" class="text-right">{!! Collective\Html\HtmlFacade::image('img/delete.png','Delete', array( 'title'=>'delete', 'width' => 24, 'height' => 24 )) !!}</a>
                                    <a class="col-lg-1" href="{{ route('lignes.edit', ['id'=>$ligne->id]) }}" class="text-right">{!! Collective\Html\HtmlFacade::image('img/edit.png','Edit', array( 'title'=>'edit', 'width' => 24, 'height' => 24 )) !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        @endif
        {!! Form::open(['url' => route('lignes.create'), 'method' => 'get']) !!}
        <input type="hidden" name="id" value="{{ $facture->id }}">

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit("Ajouter ligne", array("class"=>"btn btn-info")) !!}

            </div
                    {!! Form::close() !!}>
        </div>
    </div>
@endsection