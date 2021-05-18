@extends('layouts.app')

@section('content')
  @if($title)
    <div class="w3-center">
      <h1>{{$title}} {{$sample->sample_number}}</h1>
    </div>
  @endif
  <form action={!! route('sample.update', $sample->id)!!} method="post">
    @csrf
    @method("PUT")
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="data_sample">Data testu:</label>
        <input id="data_sample" type="date" name="date" class="w3-input" value="{{ $sample->date }}" required/>
      </div>
      <div class="w3-third">
        <label for="media">Media:</label>
        <input id="media" type="text" name="media" class="w3-input" value="{{ $sample->media }}" required/>
      </div>
      <div class="w3-third">
        <label for="sample_number">Numer próby:</label>
        <input id="sample_number" type="text" name="sample_number" class="w3-input" value="{{ $sample->sample_number }}" required/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="alloy">Stop:</label>
        <input id="alloy" type="text" name="alloy" class="w3-input" value="{{ $sample->alloy }}"/>
      </div>
      <div class="w3-third">
        <label for="substrate">Podłoże:</label>
        <input id="substrate" type="text" name="substrate" class="w3-input" value="{{ $sample->substrate }}" required/>
      </div>
      <div class="w3-third">
        <label for="support">Support:</label>
        <input id="support" type="text" name="support" value="{{ $sample->support }}" class="w3-input"/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="test_time">Czas:</label>
        <div class="w3-row">
            <input id="test_time" type="number" step="0.01" name="test_time" class="w3-input w3-threequarter" value="{{  $sample->test_time }}" required/>
            <select name="time_unit" class="w3-select w3-quarter">
                <option value="min" selected>min</option>
                <option value="sec" >sec</option>
            </select>
        </div>
      </div>
      <div class="w3-third">
        <label for="temp">Temperatura [&deg;C]:</label>
        <input id="temp" type="number" step="0.1" name="temp" class="w3-input" value="{{ $sample->temp }}" required/>
      </div>
      <div class="w3-third">
        <label for="method">Metoda/procedura:</label>
        <input id="method" type="text" name="method" class="w3-input" value="{{ $sample->method }}" required/>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="equipment">Aparatura:</label>
        <input id="equipment" type="text" name="equipment" class="w3-input" value="{{ $sample->equipment }}" required/>
      </div>
      <div class="w3-third">
        <label for="project">Projekt:</label>
        <input id="project" type="text" name="project" class="w3-input" value="{{ $sample->project }}"/>
      </div>
      <div class="w3-third">
        <label for="remarks">Uwagi:</label>
        <input id="remarks" type="text" name="remarks" class="w3-input" value="{{ $sample->remarks }}"/>
      </div>
    </div>
    <div class="w3-row-padding w3-right w3-margin">
      <input type="submit" name="add" value="Aktualizuj" class="w3-btn w3-metro-green"/>
      <a href="{{ url('/sample')}}" class="w3-btn w3-metro-red">Anuluj</a>
    </div>
  </form>
</div>
@endsection
