
    <table class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th class="col-lg-1">N°</th>
            <th class="col-lg-1">Facture</th>
            <th class="col-lg-3">Produit</th>
            <th class="col-lg-1">Quantité</th>
            <th class="col-lg-1">Prix unitaire</th>
            <th class="col-lg-1">Prix total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lignes as $ligne)
            <tr>
                <td><a href="{{ route('lignes.edit', ['id'=>$ligne->id]) }}">{{ $ligne->slug }}</a> - <a href="{{ route('index', ['slug'=>$ligne->slug]) }}">Supprimer</a></td>
                <td>{{ $ligne->facture->slug }}</td>
                <td>{{ $ligne->produit->name }}</td>
                <td>{{ $ligne->quantity }}</td>
                <td>{{ $ligne->produit->sellprice }}</td>
                <td>{{ ($ligne->quantity * $ligne->produit->sellprice) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
