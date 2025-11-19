<?php
namespace Domain;

interface VehicleRepository {
    public function saveParkingData(Vehicle $vehicle, string $entrada, string $saida, int $hours, float $price): void;
    public function getAll(): array;
    public function report(): array;
}
