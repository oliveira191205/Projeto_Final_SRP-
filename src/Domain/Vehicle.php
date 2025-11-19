<?php
namespace Domain;

abstract class Vehicle {
    public string $model;
    public float $pricePerHour;

    public function __construct($model, $pricePerHour) {
        $this->model = $model;
        $this->pricePerHour = $pricePerHour;
    }
}
