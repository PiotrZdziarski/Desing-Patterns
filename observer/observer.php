<?php

namespace Observer;

interface Observer
{
    public function add(Company $subject);
}

class ObservingGroup implements Observer
{

    private $companies;

    public function __construct()
    {
        $this->companies = array();
    }

    public function add(Company $subject)
    {
        array_push($this->companies, $subject);
    }

    public function updatePrices()
    {
        $this->notify(rand(23.99, 199.99));
    }

    private function notify($price)
    {
        foreach ($this->companies as $company) {
            $company->update($price);
        }
    }
}

interface Company
{

    public function buy();

    public function sell();

    public function update($price);
}

class Walmart implements Company
{

    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "Creating Google at $price<br>";
    }

    public function buy()
    {

    }

    public function sell()
    {

    }

    public function update($price)
    {
        $this->price = $price;
        echo "Creating setting at $price<br>";
    }
}

class Google implements Company
{

    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "Creating Walmart at $price<br>";
    }

    public function buy()
    {

    }

    public function sell()
    {

    }

    public function update($price)
    {
        $this->price = $price;
        echo "Creating setting at $price<br>";
    }
}