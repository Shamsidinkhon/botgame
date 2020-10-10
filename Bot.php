<?php
require('BotAbstract.php');

class Bot extends BotAbstract
{
    /*
     * changes guessed value in every try
     */
    public function guess()
    {
        $this->guessedValue = rand($this->rangeFrom, $this->rangeTo);
    }

    /*
     * changes selected value when round starts
     */
    public function select()
    {
        $this->selectedValue = rand($this->rangeFrom, $this->rangeTo);
    }
}