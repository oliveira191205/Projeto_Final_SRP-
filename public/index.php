<?php
require "../vendor/autoload.php";

use Domain\Car;
use Domain\Motorcycle;
use Domain\Truck;
use Infra\MySQLVehicleRepository;
use Application\VehicleService;

$msg = "";

if ($_POST) {

    $model   = $_POST["model"];
    $type    = $_POST["type"];
    $entrada = $_POST["entrada"];
    $saida   = $_POST["saida"];

    $repo = new MySQLVehicleRepository();
    $service = new VehicleService($repo);

    if ($type === "car")   $vehicle = new Car($model);
    if ($type === "motor") $vehicle = new Motorcycle($model);
    if ($type === "truck") $vehicle = new Truck($model);

    $service->registrarEntradaSaida($vehicle, $entrada, $saida);

    $msg = "Veículo registrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Veículos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-xl p-10 w-full max-w-lg">

        <h1 class="text-3xl font-bold text-blue-800 text-center mb-6">
            Cadastro de Veículos
        </h1>

        <?php if ($msg): ?>
            <p class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-center">
                <?= $msg ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block text-gray-700 font-medium mb-1">Modelo</label>
                <input 
                    type="text" 
                    name="model" 
                    required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Tipo</label>
                <select 
                    name="type"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                    <option value="car">Carro</option>
                    <option value="motor">Moto</option>
                    <option value="truck">Caminhão</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Entrada (ex: 2025-01-10 14:00)</label>
                <input 
                    type="text" 
                    name="entrada" 
                    required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Saída (ex: 2025-01-10 18:45)</label>
                <input 
                    type="text" 
                    name="saida" 
                    required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition"
            >
                Registrar Estadia
            </button>

        </form>
        <a 
            href="report.php"
            class="block text-center mt-6 text-blue-600 hover:underline"
        >
            Ver relatório
        </a>

    </div>

</body>
</html>
