<?php


abstract class GameAbstract
{
    public $rangeFrom;
    public $rangeTo;
    public $maxRound;
    public $results = [];
    public $winners = [];
    public $maxTries;

    public function __construct($rangeFrom, $rangeTo)
    {
        $this->rangeFrom = $rangeFrom;
        $this->rangeTo = $rangeTo;
    }

    abstract function play();

    abstract function getResults();
}