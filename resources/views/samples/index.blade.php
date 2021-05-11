@extends('layouts.app')

@section('content')
<div class="w3-bar w3-light-grey">
    <div class="w3-container">
        <a href="{{ url('sample/create') }}" class="w3-btn w3-metro-green ">Dodaj próbę</a>
        <a href="{{ url('sample') }}" class="w3-btn w3-metro-blue ">Lista prób</a>
        <a href="{{ url('sample/your-list') }}" class="w3-btn w3-metro-dark-blue ">Lista prób wprowadzonych przez Ciebie</a>
    </div>
    @if (!$samples->count())
        <table>
            <thead>
                <tr>
                    <td>Data</td>
                    <td>Numer próby</td>
                    <td>Stop</td>
                    <td>Podłoże/Support</td>
                    <td>Czas</td>
                    <td>Temperatura</td>
                    <td>Działania</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($samples as $sample)
                    <tr>
                        <td>{{$sample->date}}</td>
                        <td>{{$sample->sample_number}}</td>
                        <td>{{$sample->alloy}}</td>
                        <td>{{$sample->substrate}}/{{$sample->support}}</td>
                        <td>{{$sample->time}}</td>
                        <td>{{$sample->temp}}</td>
                        <td>pokaż/Edytuj/Usuń</td>
                        {{-- TODO: poprawić przyciski --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @if ('lastEntrance')
        <div class="w3-third w3-card-2">
            <h1>Ostatni numer próby</h1>
            <p>{{$lastEntrance}}</p>
        </div>
    @endif
</div>
@endsection
