<?php

use Singleton\Database;
use Factory\ShapeFactory;
use Strategy\Sort;
use Adapter\FacebookAdapter;
use Adapter\Facebook;
use Facade\PageFacade;
use Decorator\FileLogger;
use Command\StockSimulator;
use Command\UpdatePricesCommand;

require_once '../start.php';

class DisplayData
{

    private $singleton;
    private $factory;
    private $sort;
    private $facebookAdapter;
    private $pageFacade;
    private $log;
    private $command;
    private $observingGroup;
    private $company1;
    private $company2;

    public function __construct($factory, $sort, $facebookAdapter, $pageFacade, $log, $command, $observingGroup)
    {
        $this->singleton = Database::getInstance();
        $this->factory = $factory;
        $this->sort = $sort;
        $this->facebookAdapter = $facebookAdapter;
        $this->pageFacade = $pageFacade;
        $this->log = $log;
        $this->command = $command;
        $this->observingGroup = $observingGroup;

        $this->company1 = new \Observer\Google(14.99);
        $this->company2 = new \Observer\Walmart(24.99);
    }

    public function draw()
    {
        //singleton
        $this->display_data($this->singleton->query());

        //factory
        $rectangle = $this->factory->create('Rectangle');
        $this->display_data($rectangle->draw());

        //strategy
        $this->display_data($this->sort->draw());

        //adapter
        $this->display_data($this->facebookAdapter->post("Random message"));

        //facade
        $this->display_data($this->pageFacade->createAndServe("Serving a page for ID: ", $id = 17));

        //decorator
        $this->display_data($this->log->log("first file"));

        //command
        $this->display_data($this->command->execute());

        $this->display_data($this->observingGroup->add($this->company1));
        $this->display_data($this->observingGroup->add($this->company2));
    }

    private function break_line()
    {
        echo '<br>';
    }

    public function display_data($data)
    {
        echo $data;
        $this->break_line();
    }
}


$factory = new ShapeFactory();

//strategy
$data = [2123123123, 12312, 3, 542345, 5, 3, 543, 45];
$sort = new Sort($data);


//adapter
$facebookAdapter = new FacebookAdapter(new Facebook());

//facade
$pageFacade = new PageFacade();

//decorator
$log = new FileLogger();
$log = new Decorator\EmailLogger($log);
$log = new Decorator\SpaceLogger($log);


//command
$input = UpdatePricesCommand::class;

if (class_exists($input)) {

    $command = new $input(new StockSimulator());

} else {
    throw new \Exception("Error");
}
//--------


//observer
$observingGroup = new \Observer\ObservingGroup();


$displayData = new DisplayData($factory, $sort, $facebookAdapter, $pageFacade, $log, $command, $observingGroup);
$displayData->draw();
