<?php
try {  
    $host = "localhost";
    $user = "root";
    $pass = "";
    
    //conecta sem o banco definido
    $conn = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents(__DIR__ . "/database.sql");

    $conn->exec($sql);

    echo "<h2>Banco de dados criado com sucesso!</h2>";

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

