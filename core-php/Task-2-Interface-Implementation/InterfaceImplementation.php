<?php

// Logging interface definition
interface Logger {
    public function loggin($message);
}

// FileLogger class implements Logger interface
class UserLogin implements Logger {
    // Implementation of log method
    public function loggin($message) {
        echo "user login message: $message\n";
    }
}

// DatabaseLogger class implements Logger interface
class DatabaseLogger implements Logger { 
    public function loggin($message) {
        // Simulating writing to a database
        echo "Log message written to database: $message\n";
    }
}

// Example usage
$fileLogger = new UserLogin(); // Log to a file
$fileLogger->loggin("This is a user login entry.");

$databaseLogger = new DatabaseLogger(); // Log to a database
$databaseLogger->loggin("This is a database log entry.");

 
