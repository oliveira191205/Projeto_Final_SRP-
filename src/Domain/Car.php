<?php
namespace Domain;

class Car extends Vehicle {
    public function __construct($model) {
        parent::__construct($model, 5); 
    }
}