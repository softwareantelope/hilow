<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Deck //extends Model
{
    public $deck;
    
    public function set($deck) {
        $this->deck = $deck;
    }
    public function get() {
        return $this->deck;
    }
}
