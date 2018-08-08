<?php

namespace App\Http\Controllers;

use App\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{

    // shuffle the deck
    private function shuffle($cards) {
        $cards = json_decode($cards);
        shuffle($cards);
        return $cards;
    }
    
    // read the endpoint and get the deck of cards
    // returns the cards selection view
    public function get_cards() 
    {
        $endpoint = 'https://cards.davidneal.io/api/cards';
        $cardsJson = file_get_contents($endpoint);
        $cards = $this->shuffle($cardsJson);
        // store the deck
        Session::put('deck', $cards);
        // zero the scores
        Session::put('hits', 0);
        Session::put('misses', 0);
        return view('cards', ['cards' => $cards, 'result' => null]);
    }

    // A and court cards need to have values
    private function valueof($card) {
        preg_match('/([0-9A-Z]+) ([\w]+)/', $card, $matched);
        if (isset($matched)  && count($matched)>1) {
            $num = $matched[1];
            switch ($num) {
                case 'A':
                    $num = 1;
                    break;
                case 'J': 
                    $num = 10;
                    break;
                case 'Q':
                    $num = 11;
                    break;
                case 'K':
                    $num = 12;
                    break;
            }
        }
        return intval($num); 
    }

    // compare original vs nextcard and return H, L
    private function compare($original, $nextcard) 
    {

        if ($this->valueof($original) < $this->valueof($nextcard)) {
            return 'HIGH';
        }
        if ($this->valueof($original) > $this->valueof($nextcard)) {
            return 'LOW';
        }
        return 'SAME VALUE';
    }

    // process the next card
    // @Params: $request 
    // returns the card selection view
    public function next_card(Request $request) 
    {
        $high = $request->input('high');
        $low  = $request->input('low');
        $choice = isset($high) ? 'HIGH' : (isset($low) ? 'LOW' : '-');
        $original = $request->input('card');

        $deck = Session::get('deck');
        $hits = Session::get('hits');
        $misses = Session::get('misses');

        $nextcard = $deck[1]->value . ' '. $deck[1]->suit;
        array_shift($deck);

        // remember the deck
        Session::put('deck', $deck);

        // compare the coards
        $result = $this->compare($original, $nextcard);
        $msg = $choice . ' was ';
        if ($result === $high || $result === $low) {
            $msg .= "CORRECT";
            $hits++;
        } else {
            $msg .= "NOT CORRECT";
            $misses++;
        }

        // keep score
        Session::put('hits', $hits);
        Session::put('misses', $misses);

        // precompose messages for View (TODO: use a view composer)
        $msg .= ', the (previous) card was '.$original;
        $info = 'There are '.count($deck). ' cards left in the deck.';

        return view('cards', ['cards' => $deck, 'result' => $msg, 'info' => $info, 'hits' => $hits, 'misses' => $misses ]);
    }
}
