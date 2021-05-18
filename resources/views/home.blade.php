@extends('layouts.app')

@section('content')
<h1></h1>
    @if($samples->count()>0)
        <table class="w3-table w3-striped w3-bordered w3-card-4">
            <thead>
              <tr class="w3-metro-dark-blue">
                <th>Data</th>
                <th>Numer</th>
                <th>Stop</th>
                <th>Podłoże/Support</th>
                <th>Czas</th>
                <th>Temp</th>
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
                </tr>
              @endforeach
            </tbody>
        </table>
    @endif
@endsection
