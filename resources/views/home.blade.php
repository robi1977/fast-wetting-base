@extends('layouts.app')

@section('content')
<div class="w3-bar w3-light-grey">
    <div class="w3-container">
        <a href="{{ url('sample/create') }}" class="w3-btn w3-metro-green ">Dodaj próbę</a>
        <a href="{{ url('sample') }}" class="w3-btn w3-metro-blue ">Lista prób</a>
        <a href="{{ url('sample/your-list') }}" class="w3-btn w3-metro-dark-blue ">Lista prób wprowadzonych przez Ciebie</a>
    </div>
    {{-- @if ($sampleCount)
        <div class="w3-third w3-card-2">
            <h1>Liczba wprowadzonych próbek</h1>
            <p>{{$sampleCount}}</p>
        </div>
    @endif
    @if ('lastEntrance')
        <div class="w3-third w3-card-2">
            <h1>Ostatni numer próby</h1>
            <p>{{$lastEntrance}}</p>
        </div>
    @endif --}}
</div>
@endsection
