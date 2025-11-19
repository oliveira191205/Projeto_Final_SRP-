<?php
namespace Application;

use Domain\Vehicle;
use Infra\MySQLVehicleRepository;

class VehicleService {

    private MySQLVehicleRepository $repo;

    public function __construct(MySQLVehicleRepository $repo) {
        $this->repo = $repo;
    }

    public function registrarEntradaSaida(Vehicle $vehicle, string $entrada, string $saida): void {

        $entradaTime = \DateTime::createFromFormat('Y-m-d H:i', $entrada);
        $saidaTime   = \DateTime::createFromFormat('Y-m-d H:i', $saida);

        if (!$entradaTime)
            throw new \Exception("Data de entrada inválida! Formato: YYYY-MM-DD HH:MM"); //formato padrao 

        if (!$saidaTime)
            throw new \Exception("Data de saída inválida! Formato: YYYY-MM-DD HH:MM");

        if ($saidaTime <= $entradaTime)
            throw new \Exception("A saída deve ser depois da entrada.");

        $diff = $entradaTime->diff($saidaTime);
        $hours = ceil($diff->h + ($diff->i / 60));

        $price = $hours * $vehicle->pricePerHour;

        // Salvar no banco
        $this->repo->saveParkingData(
            $vehicle,
            $entrada,
            $saida,
            $hours,
            $price
        );
    }

    public function gerarRelatorio() {
        return $this->repo->report();
    }
}
