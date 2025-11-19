<?php
require "../vendor/autoload.php";

use Infra\MySQLVehicleRepository;
use Application\VehicleService;

$repo = new MySQLVehicleRepository();
$service = new VehicleService($repo);

$dados = $service->gerarRelatorio();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Faturamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-3xl mx-auto bg-white shadow-xl p-8 rounded-xl">

        <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">
            Relatório de Faturamento
        </h1>

        <a href="index.php" class="text-blue-600 underline block mb-5">< Voltar</a>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-3">Tipo</th>
                    <th class="p-3">Total de Veículos</th>
                    <th class="p-3">Faturamento</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dados as $d): ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-3"><?= $d["type"] ?></td>
                        <td class="p-3 text-center"><?= $d["total_veiculos"] ?></td>
                        <td class="p-3 font-semibold">R$ <?= number_format($d["faturamento"], 2, ",", ".") ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</body>
</html>
