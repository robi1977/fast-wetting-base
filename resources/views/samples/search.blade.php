@extends('layouts.app')

@section('content')
<form action="search-result" method="POST">
    @csrf
    @if(count($alloys))
    <div class="w3-container w3-border w3-cell">
        Stopy:
        @foreach ($alloys as $alloy)
            <p>
                <input class="w3-check" type="checkbox" name="alloys[]" value="{{ $alloy }}">
                <label>{{ $alloy }}</label>
            </p>
        @endforeach
    </div>
    @endif
    @if(count($substrates))
    <div class="w3-container w3-border w3-cell">
        Podłoża:
        @foreach ($substrates as $substrate)
            <p>
                <input class="w3-check" type="checkbox" name="substrates[]" value="{{ $substrate }}">
                <label>{{ $substrate }}</label>
            </p>
        @endforeach
    </div>
    @endif
    @if(count($temps))
    <div class="w3-container w3-border w3-cell">
        Temperatury:
        @foreach ($temps as $temp)
            <p>
                <input class="w3-check" type="checkbox" name="temps[]" value="{{ $temp }}">
                <label>{{ $temp }}</label>
            </p>
        @endforeach
    </div>
    @endif

    @if(count($test_times))
        <div class="w3-container w3-border w3-cell">
            Czasy:
            @foreach ($test_times as $test_time)
                <p>
                    <input class="w3-check" type="checkbox" name="test_times[]" value="{{ $test_time }}">
                    <label>{{ $test_time }}</label>
                </p>
            @endforeach
        </div>
        @endif
    <input type="submit" value="Szukaj" class="w3-btn w3-green">
</form>
@endsection
