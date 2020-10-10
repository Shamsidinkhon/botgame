<?php
require('BotInterface.php');


abstract class BotAbstract implements BotInterface
{
    public $name;
    public $selectedValue;
    public $guessedValue;
    public $rangeFrom;
    public $rangeTo;

    public function __construct($name, $rangeFrom, $rangeTo)
    {
        $this->name = $name;
        $this->rangeFrom = $rangeFrom;
        $this->rangeTo = $rangeTo;
    }

    abstract function guess();

    abstract function select();
}