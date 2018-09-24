<?php

use Singleton\Database;
use Factory\ShapeFactory;

require_once '../start.php';

class DisplayData{

    private $singleton;
    private $factory;

    public function __construct($factory)
    {
        $this->singleton = Database::getInstance();
        $this->factory = $factory;
    }

    public function draw()
    {
        echo $this->singleton->query();
        $this->break_line();
        $rectangle =  $this->factory->create('Rectangle');
        $rectangle->draw();
    }

    private function break_line()
    {
        echo '<br>';
    }
}

$factory = new ShapeFactory();

$displayData = new DisplayData($factory);
$displayData->draw();
