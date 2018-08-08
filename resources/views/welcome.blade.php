@extends('layouts.app')

@section('content')

<h1>High/Low Game</h1>

<p>The High/Low game is a programming test written in Laravel 5.6.  It simulates a simple game where a card is dealt from a shuffled deck, and the user is invited to guess is the next card is HIGHER or LOWER than the displayed card.  If the user guesses correctly, they score a point.  

<p>Catch: If the cards are the same, then the guess of High or Low are both wrong, in which case the user does not score a point.  A third button or accepting same value cards would be necessary to correct this aspect of the game.

<h4><a href='/cards' class="btn btn-primary">Play the game</a></h4>

@endsection