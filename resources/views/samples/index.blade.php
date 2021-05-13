@extends('layouts.app')

@section('content')
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
