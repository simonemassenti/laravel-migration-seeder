@extends('layouts.app')

@section('content')
    <h1 class="text-center">Treni</h1>
    <h3 class="text-center">Data: {{ now()->format('d-m-Y') }}</h3>

    <div class="container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Azienda</th>
                    <th scope="col">In Partenza da</th>
                    <th scope="col">Per</th>
                    <th scope="col">Orario Partenza</th>
                    <th scope="col">Arrivo previsto</th>
                    <th scope="col">Treno numero</th>
                    <th scope="col">Dettagli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <th>{{ $train->azienda }}</th>
                        <td>{{ $train->stazione_partenza }}</td>
                        <td>{{ $train->stazione_arrivo }}</td>
                        <td>{{ $train->orario_partenza }}</td>
                        <td>{{ $train->orario_arrivo }}</td>
                        <td>{{ $train->codice_treno }}</td>
                        <td>
                            @if ($train->cancellato)
                                Treno Soppresso
                            @elseif (!$train->in_orario)
                                In Ritardo
                            @else
                                In Orario
                            @endif
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
