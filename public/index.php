<?php

use Singleton\Database;
use Factory\ShapeFactory;
use Strategy\Sort;
use Adapter\FacebookAdapter;
use Adapter\Facebook;
use Facade\PageFacade;
use Decorator\FileLogger;

require_once '../start.php';

class DisplayData{

    private $singleton;
    private $factory;
    private $sort;
    private $facebookAdapter;
    private $pageFacade;
    private $log;

    public function __construct($factory, $sort, $facebookAdapter, $pageFacade, $log)
    {
        $this->singleton = Database::getInstance();
        $this->factory = $factory;
        $this->sort = $sort;
        $this->facebookAdapter = $facebookAdapter;
        $this->pageFacade = $pageFacade;
        $this->log = $log;
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

        //
        $this->log->log("first file");
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

$log = new FileLogger();
$log = new Decorator\EmailLogger($log);
$log = new Decorator\SpaceLogger($log);

$displayData = new DisplayData($factory, $sort, $facebookAdapter, $pageFacade, $log);
$displayData->draw();
