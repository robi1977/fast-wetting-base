@extends('layouts.app')

@section('content')
<div class="w3-bar w3-light-grey">
  <div class="w3-container">
    <a href="{{ url('sample/create') }}" class="w3-btn w3-metro-green ">Dodaj próbę</a>
    <a href="{{ url('sample') }}" class="w3-btn w3-metro-blue ">Lista prób</a>
    <a href="{{ url('sample/your-list') }}" class="w3-btn w3-metro-dark-blue ">Lista prób wprowadzonych przez Ciebie</a>
  </div>
  @if($title)
    <div class="w3-center">
      <h1>{{$title}}</h1>
    </div>
  @endif
  <form action={{ url('sample') }} method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="data_sample">Data testu:</label>
        <input id="data_sample" type="date" name="date" class="w3-input" value="{{ old('date') }}" required/>
      </div>
      <div class="w3-third">
        <label for="media">Media:</label>
        <input id="media" type="text" name="media" class="w3-input" value="{{ old('media') }}" required/>
      </div>
      <div class="w3-third">
        <label for="sample_number">Numer próby:</label>
        <input id="sample_number" type="text" name="sample_number" class="w3-input" value="{{ old('sample_number') }}" required/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="alloy">Stop:</label>
        <input id="alloy" type="text" name="alloy" class="w3-input" value="{{ old('alloy') }}"/>
      </div>
      <div class="w3-third">
        <label for="substrate">Podłoże:</label>
        <input id="substrate" type="text" name="substrate" class="w3-input" value="{{ old('substrate') }}" required/>
      </div>
      <div class="w3-third">
        <label for="support">Support:</label>
        <input id="support" type="text" name="support" value="{{ old('support') }}" class="w3-input"/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="test_time">Czas [min]:</label>
        <input id="test_time" type="number" step="0.01" name="test_time" class="w3-input" value="{{ old('test_time') }}" required/>
      </div>
      <div class="w3-third">
        <label for="temp">Temperatura [&deg;C]:</label>
        <input id="temp" type="number" step="0.1" name="temp" class="w3-input" value="{{ old('temp') }}" required/>
      </div>
      <div class="w3-third">
        <label for="method">Metoda/procedura:</label>
        <input id="method" type="text" name="method" class="w3-input" value="{{ old('method') }}" required/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="equipment">Aparatura:</label>
        <input id="equipment" type="text" name="equipment" class="w3-input" value="{{ old('equipment') }}" required/>
      </div>
      <div class="w3-third">
        <label for="project">Projekt:</label>
        <input id="project" type="text" name="project" class="w3-input" value="{{ old('project') }}"/>
      </div>
      <div class="w3-third">
        <label for="remarks">Uwagi:</label>
        <input id="remarks" type="text" name="remarks" class="w3-input" value="{{ old('remarks') }}"/>
      </div>
    </div>
    <div class="w3-row-padding w3-right w3-margin">
      <input type="submit" name="add" value="Dodaj" class="w3-btn w3-metro-green"/>
      <a href="{{ url('/sample')}}" class="w3-btn w3-metro-red">Anuluj</a>
    </div>
  </form>
</div>
@endsection
