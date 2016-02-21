@extends('../app')

@section('title')
    GPSCompta :
    <small>Accueil</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
            <div class="row">
                <table class="table table-striped table-hover table-condensed">
                    <caption>5 derniers clients</caption>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>ZIP</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td><a href="{{ route('clients.edit', ['id'=>$client->id]) }}">{{ $client->name }}</a></td>
                            <td>{{ $client->secondname }}</td>
                            <td>{{ $client->zip }}</td>
                        </tr>
                    @empty
                        <p>Pas de client</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-5">
            <div class="row">
                <table class="table table-striped table-hover table-condensed">
                    <caption>5 derniers fournisseurs</caption>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>ZIP</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($suppliers as $supplier)
                        <tr>
                            <td><a href="{{ route('clients.edit', ['id'=>$supplier->id]) }}">{{ $supplier->name }}</a>
                            </td>
                            <td>{{ $supplier->secondname }}</td>
                            <td>{{ $supplier->zip }}</td>
                        </tr>
                    @empty
                        <p>Pas de client</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-5 col-lg-offset-1">
            <div class="row">
                <table class="table table-striped table-hover table-condensed">
                    <caption>5 denières factures</caption>

                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Client</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($factures as $facture)
                        <tr>
                            <td><a href="{{ route('factures.show', ['id'=>$facture->id]) }}">{{ $facture->slug }}</a>
                            </td>
                            <td>{{ $facture->client->name }}</td>
                            <td>{{ $facture->description }}</td>
                        </tr>
                    @empty
                        <p>Pas de facture</p>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-5">
            <div class="row">
                <table class="table table-striped table-hover table-condensed">
                    <caption>5 deniers devis</caption>

                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Client</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($devis as $devi)
                        <tr>
                            <td><a href="{{ route('factures.show', ['id'=>$devi->id]) }}">{{ $devi->slug }}</a></td>
                            <td>{{ $devi->client->name }}</td>
                            <td>{{ $devi->description }}</td>
                        </tr>
                    @empty
                        <p>Pas de devis</p>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <table class="table table-striped table-hover table-condensed">
                    <caption>5 derniers produits</caption>
                    <thead>
                    <tr>
                        <th class="col-lg-4">Nom</th>
                        <th class="col-lg-6">Description</th>
                        <th class="col-lg-2">Prix</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($produits as $produit)
                        <tr>
                            <td><a href="{{ route('produits.edit', ['id'=>$produit->id]) }}">{{ $produit->name }}</a>
                            </td>
                            <td>{{ str_limit($produit->description, 80) }}</td>
                            <td class="text-right">{{ $produit->sellprice }} €</td>
                        </tr>
                    @empty
                        <p>Pas de produit</p>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection