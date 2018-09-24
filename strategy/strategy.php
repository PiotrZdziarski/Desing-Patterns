<?php

namespace Strategy;

interface SortStrategy {
    public function sort();
}

class NormalSort {

    private $data;

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function sort() {
        rsort($this->data);

        foreach ($this->data as $datum) {
            echo $datum. ',';
        }
    }
}

class RSort {

    private $data;

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function sort() {
        sort($this->data);

        foreach ($this->data as $datum) {
            echo $datum. ',';
        }
    }
}


class Sort {

    private $quickSort;
    private $mergeSort;

    public function __construct(Array $data)
    {
        $this->quickSort = new NormalSort($data);
        $this->mergeSort = new RSort($data);
    }

    public function draw() {
        $this->mergeSort->sort();
        $this->quickSort->sort();
    }
}

