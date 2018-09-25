<?php

namespace Command;

interface Command {

    public function execute();
}

class GetCompanyCommand implements Command {

    private $stockSimulator;

    public function __construct(StockSimulator $stockSimulator)
    {
        $this->stockSimulator = $stockSimulator;
    }

    public function execute()
    {
        $this->stockSimulator->getCompany();
    }
}

class UpdatePricesCommand implements Command {

    private $stockSimulator;

    public function __construct(StockSimulator $stockSimulator)
    {
        $this->stockSimulator = $stockSimulator;
    }

    public function execute()
    {
        $this->stockSimulator->updatePrice();
    }
}

class StockSimulator {

    public function getCompany(){
        echo "Company retrieved!";
    }

    public function updatePrice() {
        echo "Price updated!";
    }
}


