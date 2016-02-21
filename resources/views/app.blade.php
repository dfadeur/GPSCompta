<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPSCompta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <header><h2 class="text-center">@yield('title', 'GPSCompta')</h2></header>

            <nav role="navigation" class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav ">
                            <li><a href="{{ route('index') }}">Accueil</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                    aria-expanded="false">Clients<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('clients.index') }}">Liste</a></li>
                                    <li><a href="{{ route('clients.create') }}">Ajouter</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                    aria-expanded="false">Produits<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('produits.index') }}">Liste</a></li>
                                    <li><a href="{{ route('produits.create') }}">Ajouter</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                    aria-expanded="false">Factures<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('factures.index', array('status'=>'facture', 'type'=>'vente')) }}">Factures clients</a></li>
                                    <li><a href="{{ route('factures.index', array('status'=>'facture', 'type'=>'achat marchandises')) }}">Factures fournisseurs</a></li>
                                    <li><a href="{{ route('factures.index', array('status'=>'devis', 'type'=>'vente')) }}">Devis clients</a></li>
                                    <li><a href="{{ route('factures.create') }}">Ajouter</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                    aria-expanded="false">Comptabilité<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('salesbook') }}">Livre des ventes</a></li>
                                    <li><a href="{{ route('buybook') }}">Livre des achats</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="{{ url('/auth/login') }}">Connexion</a></li>

                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/auth/logout') }}">Déconnexion</a></li>
                                        <li><a href="{{ url('/auth/register') }}">Nouvel utilisateur</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
            @endif
            @include('error')
            @yield('content')
        </div>
    </div>
</div>
<div id="footer" class="navbar-fixed-bottom">
    <div class="container-fluid text-center">
        <p>Software from {!! Collective\Html\HtmlFacade::image('img/logo-small.png','Global PC Services', array( 'width' => 130, 'height' => 35 )) !!}</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
