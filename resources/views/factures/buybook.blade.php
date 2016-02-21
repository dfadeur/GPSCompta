@extends('../app')
<?php setlocale(LC_TIME, 'fra', 'fr_FR');?>
@section('title')
    GPSCompta :
    <small>Livre des achats</small>
@endsection

@section('content')

    @foreach($annee as $an)
        <div class="row">
        <div class="col-lg-4">
            <?php $totalgeneral = 0; ?>
            {{--@foreach($result as $mois)--}}
            <h2>Achat marchandises {{ $an->date_part }}</h2>
            <table class="table table-bordered table-striped table-hover table-condensed ">
                <thead>
                <tr>
                    <th class="col-lg-1">Date</th>
                    <th class="col-lg-1">Numéro</th>
                    <th class="col-lg-1">Description</th>
                    <th class="col-lg-1">Fournisseur</th>
                    <th class="col-lg-1">Montant</th>
                </tr>
                </thead>
                <tbody>
                @foreach($marchandises as $marchandise)
                    @if($marchandise->updated_at->format('Y') == $an->date_part)
                        <tr>
                            <td>
                                <small>{{ $marchandise->updated_at->format('d/m/Y') }}</small>
                            </td>
                            <td>
                                <small>{{ $marchandise->slug }}</small>
                            </td>
                            <td>
                                <small>{{ $marchandise->description }}</small>
                            </td>
                            <td>
                                <small>{{ strtoupper($marchandise->client->name) }} {{ $marchandise->client->secondname }}</small>
                            </td>
                            <?php $total = 0; ?>
                            @foreach($marchandise->lignes as $ligne)
                                <?php $total = $total + ($ligne->produit->buyprice * $ligne->quantity); ?>
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
        </div>
        <div class="col-lg-4">
            <?php $totalgeneral = 0; ?>
            {{--@foreach($result as $mois)--}}
            <h2>Frais divers {{ $an->date_part }}</h2>
            <table class="table table-bordered table-striped table-hover table-condensed ">
                <thead>
                <tr>
                    <th class="col-lg-1">Date</th>
                    <th class="col-lg-1">Numéro</th>
                    <th class="col-lg-2">Description</th>
                    <th class="col-lg-2">Fournisseur</th>
                    <th class="col-lg-1">Montant</th>
                </tr>
                </thead>
                <tbody>
                @foreach($frais as $frai)
                    @if($frai->updated_at->format('Y') == $an->date_part)
                        <tr>
                            <td>
                                <small>{{ $frai->updated_at->format('d/m/Y') }}</small>
                            </td>
                            <td>
                                <small>{{ $frai->slug }}</small>
                            </td>
                            <td>
                                <small>{{ $frai->description }}</small>
                            </td>
                            <td>
                                <small>{{ strtoupper($frai->client->name) }} {{ $frai->client->secondname }}</small>
                            </td>
                            <?php $total = 0; ?>
                            @foreach($frai->lignes as $ligne)
                                <?php $total = $total + ($ligne->produit->buyprice * $ligne->quantity); ?>
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
        </div>
        <div class="col-lg-4">
            <?php $totalgeneral = 0; ?>
            {{--@foreach($result as $mois)--}}
            <h2>Investissements {{ $an->date_part }}</h2>
            <table class="table table-bordered table-striped table-hover table-condensed ">
                <thead>
                <tr>
                    <th class="col-lg-1">Date</th>
                    <th class="col-lg-1">Numéro</th>
                    <th class="col-lg-2">Description</th>
                    <th class="col-lg-2">Fournisseur</th>
                    <th class="col-lg-1">Montant</th>
                </tr>
                </thead>
                <tbody>
                @foreach($investissements as $investissement)
                    @if($investissement->updated_at->format('Y') == $an->date_part)
                        <tr>
                            <td>
                                <small>{{ $investissement->updated_at->format('d/m/Y') }}</small>
                            </td>
                            <td>
                                <small>{{ $investissement->slug }}</small>
                            </td>
                            <td>
                                <small>{{ $investissement->description }}</small>
                            </td>
                            <td>
                                <small>{{ strtoupper($investissement->client->name) }} {{ $investissement->client->secondname }}</small>
                            </td>
                            <?php $total = 0; ?>
                            @foreach($investissement->lignes as $ligne)
                                <?php $total = $total + ($ligne->produit->buyprice * $ligne->quantity); ?>
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
            </div>
        </div>
        <span class="row">
            <div class="col-lg-4 text-center">
                -------------------------------------------------------------
            </div>
            <div class="col-lg-4 text-center">
                -------------------------------------------------------------
            </div>
            <div class="col-lg-4 text-center">
                -------------------------------------------------------------
            </div>
        </span>
    @endforeach

@endsection