@extends('../app')

@section('title')
    GPSCompta :
    <small>Clients</small>
@endsection

@section('content')


        @foreach($clients as $client)

            <H3><a href="{{ route('clients.edit', ['id'=>$client->id]) }}">{{ $client->name }} {{ $client->secondname }}</a></H3>
            <small>{{ $client->adress }}</small><br>
            <small>{{ $client->zip }} {{ $client->city }}</small><br>
            <small>Tél: {{ $client->phone }} GSM: {{ $client->mobile }}</small><br>
            <small>{{ $client->mail }}</small><br>
            <small>TVA: {{ $client->tva }}</small><br>
            @if(count($client->factures) != 0)
                <div class="col-lg-10 col-lg-offset-2">
                    <div class="row">
                        <table class="table table-striped table-hover table-condensed ">
                            <thead>
                            <tr>
                                <th class="col-lg-2">N°</th>
                                <th class="col-lg-8">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client->factures as $facture)
                                <tr>
                                    <td>
                                        <small>{{ $facture->slug }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $facture->description }}</small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach


@endsection