<?php

namespace Factory;

interface Shape {

    public function draw();
}

class Position {}
class Rectangle implements Shape {

    private $position;

    public function __construct($position)
    {
        $this->position = $position;
    }


    /**
     * Draw a rectangle
     */
    public function draw()
    {
        echo "Drawing a rectangle";
    }
}

class ShapeFactory {

    public function create($type)
    {
        if($type == 'Rectangle') {
            return new Rectangle(new Position());
        }
    }
}