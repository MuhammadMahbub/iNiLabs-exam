<?php

class Employee {
    // Private properties
    private $name;
    private $position;
    private $salary;

    // Constructor to initialize employee data
    public function __construct($name, $position, $salary) {
        $this->name = $name;
        $this->position = $position;
        $this->setSalary($salary); // Using setter to validate the salary
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Getter for position
    public function getPosition() {
        return $this->position;
    }

    // Getter for salary (read-only access to salary)
    public function getSalary() {
        return $this->salary;
    }

    // Setter for salary with validation
    public function setSalary($salary) {
        if ($salary > 0) {
            $this->salary = $salary;
        } else {
            throw new Exception("Salary must be a positive number.");
        }
    }

    // Method to display employee details
    public function displayEmployeeInfo() {
        echo "Name: " . $this->getName() . "\n";
        echo "Position: " . $this->getPosition() . "\n";
        echo "Salary: " . $this->getSalary() . "\n";
    }
}

// Example usage
try {
    $employee1 = new Employee("Mahbub Doe", "Software Engineer", 30000);
    $employee1->displayEmployeeInfo();

    // Trying to set a new salary
    $employee1->setSalary(12000);
    echo "Updated Salary: " . $employee1->getSalary() . "\n";

    // Trying to set an invalid salary
    $employee1->setSalary(-300); // This will throw an exception

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

 