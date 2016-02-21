@extends('../app')

@section('title')
    GPSCompta : <small>Factures</small>
@endsection

@section('content')
    <div class="col-lg-12">
            @foreach($factures as $facture)
                <div class="row">
                    <h3><a href="{{ route('factures.show', ['id'=>$facture->id]) }}">{{ $facture->slug }} - {{ $facture->status }}</a></h3>
                    <h4>{{ $facture->client->name }} {{ $facture->client->secondname }} : {{ $facture->description }}</h4>
                </div>
            @if(count($facture->lignes) != 0)
                <div class="col-lg-10 col-lg-offset-2">
                    <div class="row">
                        <table class="table table-striped table-hover table-condensed ">
                            <thead>
                            <tr>
                                <th class="col-lg-7">Produit</th>
                                <th class="col-lg-1">Prix unitaire</th>
                                <th class="col-lg-1">Quantité</th>
                                <th class="col-lg-1">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
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
                                        <?php $total = $total+($ligne->produit->sellprice*$ligne->quantity); ?>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h3 class="text-right">Total : {{ $total }}</h3>
                </div>
            @endif
            <div class="well well-lg">...</div>
            @endforeach
    </div>
@endsection