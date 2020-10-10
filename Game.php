<?php
require('GameAbstract.php');
require('Round.php');


class Game extends GameAbstract
{
    public $maxRound = 3;
    public $maxTries = 10;

    /*
     * Plays round until winner is found
     */
    function play()
    {
        for ($i = 1; $i <= $this->maxRound; $i++) {
            $round = new Round($i, $this->rangeFrom, $this->rangeTo, $this->maxTries);
            $round->compete();
            $this->results[$i]['results'] = $round->getResult();
            $this->results[$i]['winner'] = $round->winner->name;
            if (in_array($round->winner->name, $this->winners))
                break;
            $this->winners[] = $round->winner->name;
        }
    }


    /*
     * returns result of every round
     */
    function getResults()
    {
        return $this->results;
    }
}