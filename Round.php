<?php
require('Bot.php');

class Round
{
    public $round;
    public $rangeFrom;
    public $rangeTo;
    public $result = [];
    public $winner;
    public $maxTries;

    public function __construct($round, $rangeFrom, $rangeTo, $maxTries)
    {
        $this->round = $round;
        $this->rangeFrom = $rangeFrom;
        $this->rangeTo = $rangeTo;
        $this->maxTries = $maxTries;
    }

    /*
     * Competes two bots until second bot guesses right answer or it reaches max tries
     */
    public function compete()
    {
        $bot1 = new Bot('Bot 1', $this->rangeFrom, $this->rangeTo);
        $bot1->select();
        $bot2 = new Bot('Bot 2', $this->rangeFrom, $this->rangeTo);
        for ($i = 1; $i <= $this->maxTries; $i++) {
            $bot2->guess();
            $this->result[$i] = [$bot1->selectedValue, $bot2->guessedValue];
            if ($bot1->selectedValue == $bot2->guessedValue) {
                $this->winner = $bot2;
                break;
            }
        }
        if (!$this->winner)
            $this->winner = $bot1;
    }

    /*
     * returns result of round tries between two bots
     */
    public function getResult()
    {
        return $this->result;
    }
}