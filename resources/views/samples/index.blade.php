@extends('layouts.app')

@section('content')
<div class="w3-bar w3-light-grey">
  <div class="w3-container">
    <a href="{{ url('sample/create') }}" class="w3-btn w3-metro-green ">Dodaj próbę</a>
    <a href="{{ url('list') }}" class="w3-btn w3-metro-blue ">Lista prób</a>
    <a href="{{ url('your-list') }}" class="w3-btn w3-metro-dark-blue ">Lista prób wprowadzonych przez Ciebie</a>
  </div>
  {{-- @if($message)
    <div class="w3-panel w3-metro-light-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-display-topright">X</span>
        <p>{{$message}}</p>
    </div>
  @endif --}}
  @if($title)
    <div class="w3-center">
      <h1>{{$title}}</h1>
    </div>
  @endif
  @if (!$samples->count())
    <div class="w3-panel w3-red w3-center">
      <h2>Brak danych do wyświetlenia</h2>
    </div>
  @else
    <table class="w3-table w3-striped w3-bordered w3-card-4">
      <thead>
        <tr class="w3-metro-dark-blue">
          <th>Data</th>
          <th>Numer</th>
          <th>Stop</th>
          <th>Podłoże/Support</th>
          <th>Czas</th>
          <th>Temp</th>
          <th>Działania</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($samples as $sample)
          <tr>
            <td>{{$sample->date}}</td>
            <td>{{$sample->sample_number}}</td>
            <td>{{$sample->alloy}}</td>
            <td>{{$sample->substrate}} / {{$sample->support}}</td>
            <td>{{$sample->test_time}}</td>
            <td>{{$sample->temp}}</td>
            <td>
                <a href="{{ url('sample/'.$sample->id) }}"> Pokaż </a>
                <a href="{{ url('sample/'.$sample->id.'/edit') }}"> Edytuj </a>
                <form action="{{ url('sample/'.$sample->id) }}" method="delete">
                    @csrf
                    <input type="hidden" value="{{$sample->id}}" name="id">
                    <input type="submit" value="Usuń">
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
