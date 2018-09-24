<?php

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

//function drawStuff(Shape $shape) {
//    $shape->draw();
//}
//$shape = new Rectangle();
//drawStuff($shape);'

$factory = new ShapeFactory();
$rectangle = $factory->create('Rectangle');
$rectangle->draw();