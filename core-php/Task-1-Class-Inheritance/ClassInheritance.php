<?php 
abstract class Shape {
    // Abstract method to calculate area
    abstract public function area();
}

// Circle class inherits from Shape
class Circle extends Shape {
    private $radius;

    // Constructor to initialize radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Override area method to calculate circle area
    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

// Rectangle class inherits from Shape
class Rectangle extends Shape {
    private $width;
    private $length;

    // Constructor to initialize width and height
    public function __construct($width, $length) {
        $this->width = $width;
        $this->length = $length;
    }

    // Override area method to calculate rectangle area
    public function area() {
        return $this->width * $this->length;
    }
}

// Example usage
$circle = new Circle(5);  // Circle with radius 5
echo "Area of circle: " . $circle->area() . "\n";

$rectangle = new Rectangle(4, 6);  // Rectangle with width 4 and height 6
echo "Area of rectangle: " . $rectangle->area() . "\n";