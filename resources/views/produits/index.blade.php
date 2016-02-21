@extends('../app')

@section('title')
    GPSCompta :
    <small>Produits</small>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <table class="table table-striped table-hover table-condensed">

                <thead>
                <tr>
                    <th class="col-lg-4">Nom</th>
                    <th class="col-lg-7">Description</th>
                    <th class="col-lg-1 ">Prix</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produits as $produit)
                    <tr>

                        <td>
                            <div class="row">
                                <a class="col-lg-10" href="{{ route('produits.edit', ['id'=>$produit->id]) }}">{{ $produit->name }}</a>
                                @if($produit->actif)
                                    <a class="col-lg-1" href="{{ route('produits.destroy', ['id'=>$produit->id]) }}" class="text-right">{!! Collective\Html\HtmlFacade::image('img/delete.png','Désactiver', array( 'title'=>'Désactiver', 'width' => 24, 'height' => 24 )) !!}</a>
                                @else
                                    <a class="col-lg-1" href="{{ route('produits.destroy', ['id'=>$produit->id]) }}" class="text-right">{!! Collective\Html\HtmlFacade::image('img/activer.png','Activer', array( 'title'=>'Activer', 'width' => 24, 'height' => 24 )) !!}</a>
                                @endif
                            </div>
                        </td>
                            <td>{{ $produit->description }}</td>
                        <td class="text-right">{{ $produit->sellprice }} €</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection