@extends('../app')

@section('title')
    GPSCompta :
    <small>Détails client</small>
@endsection

@section('content')
    @foreach($clients as $client)
    <H3><a href="{{ route('clients.edit', ['id'=>$client->id]) }}">{{ $client->name }} {{ $client->secondname }}</a></H3>

    @if(count($client->factures) != 0)

        <table class="col-lg-10 col-lg-offset-2 table table-striped table-hover table-condensed ">
            <thead>
            <tr>
                <th class="col-lg-3">N°</th>
                <th class="col-lg-7">Description</th>
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
    @endif
@endforeach
@endsection