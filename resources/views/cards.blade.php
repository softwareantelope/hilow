@extends('layouts.app')

@section('content')
<div id="cards">
    <h1>High/Low Game</h1>
    <div id="firstCard" class="larger">
        {{ $cards[0]->value }} {{ $cards[0]->suit }} 
    </div>
    <div class="large">
        Guess if the next card is higher or lower than this card?
        <form action="nextcard" method="get" class="question">
            <input type="hidden" name="high" value="HIGH">
            <input type="hidden" name="card" value="{{ $cards[0]->value }} {{ $cards[0]->suit }}">
            <button>HIGHER</button>
        </form>
        <form action="nextcard" method="get" class="question">    
            <input type="hidden" name="low" value="LOW">
            <input type="hidden" name="card" value="{{ $cards[0]->value }} {{ $cards[0]->suit }}">
            <button>LOWER</button>
        </form>
    </div>
    @if($result)
    <div>
        
        <div class="large"><p><em>Result</em></p> {{ $result }}</div>
        <div>{{$info}}</div>
    </div>
    <h5>
        <a href="/cards">Reshuffle</a>
    </h5>
    @endif
</div>
<div id="app">
    <cards-component></cards-component>
</div>
@endsection