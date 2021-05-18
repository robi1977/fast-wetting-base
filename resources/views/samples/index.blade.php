@extends('layouts.app')

@section('content')
  @if($message=Session::get('success'))
    <div class="w3-panel w3-pale-green w3-border w3-display-container">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p>{{$message}}</p>
    </div>
  @endif
  @if($title)
    <div class="w3-center">
      <h1>{{$title}}</h1>
    </div>
  @endif
  @if (!count($samples))
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
                <form action="{{ url('sample/'.$sample->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <a href="{{ url('sample/'.$sample->id) }}"><i class="fas fa-eye w3-text-green fa-lg"></i></a>
                <a href="{{ url('sample/'.$sample->id.'/edit') }}"><i class="fas fa-edit w3-text-black fa-lg"></i></a>
                <button type="submit" title="Delete" style="border: none; background-color:transparent;"><i class="fas fa-trash w3-text-red"></i></button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
