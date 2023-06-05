<?php
$dbhost = "localhost:3307";
$dbuser = "root";
$dbwaachtwoord = "";
$dbnaam = "winkel";

$dsn = "mysql:host=$dbhost;dbname=$dbnaam;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $dbuser, $dbwaachtwoord, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// alles selecteert in een query zonder variabele

$query = "SELECT * FROM producten";

$stmt = $pdo->query($query);

// -

 

// een single row selecteert met placeholders

$query = "SELECT * FROM producten WHERE product_code = :product_code";

$stmt = $pdo->prepare($query);

$productCode = 1;

$stmt->bindParam(':product_code', $productCode);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// -

 

// een single row selecteert met named parameters

$query = "SELECT * FROM producten WHERE product_code = :product_code";

$stmt = $pdo->prepare($query);

$params = array(

    ':product_code' => 2

);

$stmt->execute($params);

$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>