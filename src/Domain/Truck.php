<?php
namespace Domain;

class Truck extends Vehicle {
    public function __construct($model) {
        parent::__construct($model, 10); 
    }
}
