<?php

use Singleton\Database;
use Factory\ShapeFactory;
use Strategy\Sort;
use Adapter\FacebookAdapter;
use Adapter\Facebook;
use Facade\PageFacade;

require_once '../start.php';

class DisplayData{

    private $singleton;
    private $factory;
    private $sort;
    private $facebookAdapter;
    private $pageFacade;

    public function __construct($factory, $sort, $facebookAdapter, $pageFacade)
    {
        $this->singleton = Database::getInstance();
        $this->factory = $factory;
        $this->sort = $sort;
        $this->facebookAdapter = $facebookAdapter;
        $this->pageFacade = $pageFacade;
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

        //adapter
        $this->facebookAdapter->post("Random message");
        $this->break_line();

        //facade
        $id = 17;
        $this->pageFacade->createAndServe("Serving a page for ID: ", $id);
        $this->break_line();


    }

    private function break_line()
    {
        echo '<br>';
    }
}


$factory = new ShapeFactory();

$data = [2123123123,12312,3,542345,5,3,543,45];
$sort = new Sort($data);

$facebookAdapter = new FacebookAdapter(new Facebook());

$pageFacade = new PageFacade();

$displayData = new DisplayData($factory, $sort, $facebookAdapter, $pageFacade);
$displayData->draw();
