<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPSCompta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/style.css" media="screen">
    <style>
        @page { margin: 50px 46px 50px; }
        .header {
            overflow: auto ;

        }

        .logo {
            float: left;
            width: 50%;
        }
        .reffacture {
            margin-left: 60%;
            width: 40%;
        }
        .emetteur{
            float: left;
            width: 40%;
        }
        .client{
            width: 40%;
            margin-left: 60%;
        }

        .gps, .clientcoord{
            padding: 5px;
            background-color: lightgray;
        }
        body {
            position: relative;
        }
        .banque {
            position: absolute;
            bottom: 70px;
            border: 1px solid black;
        }
        .footer {
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            border-top: 1px solid black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <a>{!! Collective\Html\HtmlFacade::image('img/logo-small.png','Edit', array( 'title'=>'edit', 'width' => 324, 'height' => 78 )) !!}</a>

        </div>
        <div class="reffacture">
            @if(substr($facture->slug,0,1)=='F')
                <h3>Facture</h3>
            @elseif(substr($facture->slug,0,1)=='D')
                <h3>Devis</h3>
            @endif
            <small>Réf {!! $facture->slug !!}</small><br>
            <small>Date de facturation : {!! $facture->updated_at->format('d/m/Y') !!}</small><br>
            <small>Code client : {!! $facture->client->slug !!}</small>
        </div>
    </div>
    <br><br>
    <div class="emetteur">
        Émetteur :<br>
        <div class="gps">
             <h3>Global PC Services</h3><br>
             Chaussée de Louvain, 479<br>
             5004 BOUGE<br>
             GSM : 0485/53.40.49<br>
             Mail : info@globalps.be
        </div>
    </div>
    <div class="client">
        Adressé à :
        <div class="clientcoord">
            <h3>{!! $facture->client->name !!} {!! $facture->client->secondname !!}</h3><br>
            {!! $facture->client->adress !!}<br>
            {!! $facture->client->zip !!} {!! $facture->client->city !!}<br>
            @if($facture->client->phone)
            Tél : {!! $facture->client->phone !!}
            @endif
            @if($facture->client->mobile)
                / {!! $facture->client->mobile !!}
            @endif
            <br>
            @if($facture->client->mail)
            Mail : {!! $facture->client->mail !!}<br>
            @endif
            @if($facture->client->tva)
            TVA : {!! $facture->client->tva !!}
            @endif
        </div>
    </div>
    <h2>{!! $facture->description !!}</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
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
                    <small>{{ $ligne->produit->sellprice*$ligne->quantity }}</small>
                    <?php $total = $total+($ligne->produit->sellprice*$ligne->quantity); ?>
                </td>

            </tr>
        @endforeach
        <tr>
            <td><h3>Total</h3></td>
            <td></td>
            <td></td>
            <td><h3>{{ $total }}</h3></td>
        </tr>
        @if($facture->advance != 0)
            <tr>
                <td><h3>Acompte reçu</h3></td>
                <td></td>
                <td></td>
                <td><h3>{{ $facture->advance }} €</h3></td>
            </tr>
            <tr>
                <td><h3>Solde facture</h3></td>
                <td></td>
                <td></td>
                <td><h3>{{ $total-$facture->advance }} €</h3></td>
            </tr>
        @endif
        </tbody>
    </table>
    @if(substr($facture->slug,0,1)=='F')
        Conditions de réglement : Réglement à 15 jours
    @elseif(substr($facture->slug,0,1)=='D')
        Le paiement de 50% du devis et le renvoi de ce document signé vaut commande.<br>
        L'envoi par mail est fortement encouragé.
    @endif

</div>
<div class="banque">
    Réglement par virement sur le compte bancaire suivant:<br>
    Banque:         Record Bank<br>
    Code IBAN:      BE51 6528 2529 3462<br>
    Code BIC/SWIFT: HBKABE22<br>
</div>
<div class="footer">
    <p class="text-center">Régime particulier de franchise des petites entreprises</p>
    <p class="text-center">N° professionnel : 0692467558</p>
</div>

</body>
</html>
