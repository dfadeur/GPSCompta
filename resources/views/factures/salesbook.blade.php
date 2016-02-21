@extends('../app')
<?php setlocale(LC_TIME, 'fra', 'fr_FR');?>
@section('title')
    GPSCompta :
    <small>Livre des ventes</small>
@endsection

@section('content')
    <div class="col-lg-7">
        @foreach($annee as $an)
            <?php $totalgeneral = 0; ?>
            {{--@foreach($result as $mois)--}}
            <h2>{{ $an->date_part }}</h2>
                <table class="table table-bordered table-striped table-hover table-condensed ">
                    <thead>
                    <tr>
                        <th class="col-lg-1">Date</th>
                        <th class="col-lg-1">Numéro</th>
                        <th class="col-lg-2">Description</th>
                        <th class="col-lg-2">Client</th>
                        <th class="col-lg-1">Montant</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($factures as $facture)
                        @if($facture->updated_at->format('Y') == $an->date_part)
                        <tr>
                            <td>
                                <small>{{ $facture->updated_at->format('d/m/Y') }}</small>
                            </td>
                            <td>
                                <small>{{ $facture->slug }}</small>
                            </td>
                            <td>
                                <small>{{ $facture->description }}</small>
                            </td>
                            <td>
                                <small>{{ strtoupper($facture->client->name) }} {{ $facture->client->secondname }}</small>
                            </td>
                            <?php $total = 0; ?>
                            @foreach($facture->lignes as $ligne)
                                <?php $total = $total + ($ligne->produit->sellprice * $ligne->quantity); ?>
                            @endforeach
                            <td>
                                <small class="text-center">{{ $total }} €</small>
                            </td>
                        </tr>
                        <?php $totalgeneral = $totalgeneral + $total;?>
                        @endif

                    @endforeach
                    </tbody>
                </table>
                <h3 class="text-right">Total général : {{ $totalgeneral }}</h3>
            {{--@endforeach--}}
        @endforeach
    </div>
@endsection