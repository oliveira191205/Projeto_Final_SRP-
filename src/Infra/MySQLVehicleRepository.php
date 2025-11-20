<?php
namespace Infra;

use PDO;
use Domain\Vehicle;
use Domain\VehicleRepository;

class MySQLVehicleRepository implements VehicleRepository
{
    private PDO $conn;

    public function __construct()
    {
        $host = "localhost";
        $dbname = "srp";
        $user = "root";
        $pass = "";

        try {
            // vai tentar conectar o banco
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        } catch (\PDOException $e) {

            // Se nao existir, vai criar 
            $temp = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
            $temp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqlFile = __DIR__ . "/../database.sql"; 

            if (file_exists($sqlFile)) {
                $sql = file_get_contents($sqlFile);
                $temp->exec($sql); //banco + tabelas
            } else {
                die("Arquivo database.sql não encontrado em: $sqlFile");
            }

            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        }

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function saveParkingData(Vehicle $vehicle, string $entrada, string $saida, int $hours, float $price): void
    {
        $sql = "INSERT INTO parking (model, type, entry_time, exit_time, total_hours, price) 
                VALUES (:model, :type, :entry_time, :exit_time, :total_hours, :price)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":model"       => $vehicle->model,
            ":type"        => strtolower((new \ReflectionClass($vehicle))->getShortName()),
            ":entry_time"  => $entrada,
            ":exit_time"   => $saida,
            ":total_hours" => $hours,
            ":price"       => $price
        ]);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM parking ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function report(): array
    {
        $sql = "SELECT 
                    type,
                    COUNT(*) AS total_veiculos,
                    SUM(price) AS faturamento
                FROM parking
                GROUP BY type";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

