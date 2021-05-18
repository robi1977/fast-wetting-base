@extends('layouts.app')

@section('content')
    <h1>Próba numer: {{ $sample->sample_number}}</h1>
    <h2>{{$sample->alloy}}/{{$sample->substrate}}
        @if($sample->support !="")
            <sub><i>support:</i> {{$sample->support}}</sub>
        @endif
    </h2>
    <p>
        Temp: <strong>{{$sample->temp}}</strong>;
        Czas: <strong>{{$sample->test_time}} [{{$sample->time_unit}}]</strong>;
        Procedura: {{$sample->method}}</p>
    <p>
        Data: <i>{{$sample->date}}</i>;
        Urządzenie: <i>{{$sample->equipment}}</i>;
        Media: <i>{{$sample->media}}</i>;
        Projekt: <i>{{$sample->project}}</i>
    </p>
    <p><u>Uwagi: </u>{{$sample->remarks}}</p>

@endsection
