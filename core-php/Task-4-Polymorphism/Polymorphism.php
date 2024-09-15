<?php

// Base Animal class
class Animal {
    // Method to be overridden
    public function makeSound() {
        return "Some generic animal sound";
    }
}

// Dog class inherits from Animal and overrides makeSound method
class Dog extends Animal {
    public function makeSound() {
        return "Bark";
    }
}

// Cat class inherits from Animal and overrides makeSound method
class Cat extends Animal {
    public function makeSound() {
        return "Meow";
    }
}

// Cow class inherits from Animal and overrides makeSound method
class Cow extends Animal {
    public function makeSound() {
        return "Moo";
    }
}

// Example usage
$animals = [new Dog(), new Cat(), new Cow()];

foreach ($animals as $animal) {
    echo get_class($animal) . ": " . $animal->makeSound() . "\n";
}

 
