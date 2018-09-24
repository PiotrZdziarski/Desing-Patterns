<?php

use Singleton\Database;
use Factory\ShapeFactory;
use Strategy\Sort;

require_once '../start.php';

class DisplayData{

    private $singleton;
    private $factory;
    private $sort;

    public function __construct($factory, $sort)
    {
        $this->singleton = Database::getInstance();
        $this->factory = $factory;
        $this->sort = $sort;
    }

    public function draw()
    {
        //singleton
        echo $this->singleton->query();
        $this->break_line();

        //factory
        $rectangle =  $this->factory->create('Rectangle');
        $rectangle->draw();
        $this->break_line();

        //strategy
        $this->sort->draw();
        $this->break_line();

        
    }

    private function break_line()
    {
        echo '<br>';
    }
}




$factory = new ShapeFactory();

$data = [2123123123,12312,3,542345,5,3,543,45,];
$sort = new Sort($data);

$displayData = new DisplayData($factory, $sort);
$displayData->draw();
