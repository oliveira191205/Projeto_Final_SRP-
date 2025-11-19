<?php
namespace Domain;

class Motorcycle extends Vehicle {
    public function __construct($model) {
        parent::__construct($model, 3); 
    }
}
