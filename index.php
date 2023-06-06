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

// $query = "SELECT * FROM producten WHERE product_code = :product_code";

// $stmt = $pdo->prepare($query);

// $productCode = 1;

// $stmt->bindParam(':product_code', $productCode);

// $stmt->execute();

// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// // -

 

// // een single row selecteert met named parameters

// $query = "SELECT * FROM producten WHERE product_code = :product_code";

// $stmt = $pdo->prepare($query);

// $params = array(

//     ':product_code' => 2

// );

// $stmt->execute($params);

// $row = $stmt->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>

<body>

    <table>

            <tr>

                <th scope="col">Naam</th>

                <th scope="col">Prijs</th>

                <th scope="col">Omschrijving</th>

            </tr>

        <tbody>
        <?php

//Hoe je alles selecteert in een query zonder variabele

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>";

        echo "<td>".$row['product_naam']."</td>";

        echo "<td>".$row['prijs_per_stuk']."</td>";

        echo "<td>".$row['omschrijving']."</td>";

        echo "</tr>";

    }

    //-



    // Hoe je een single row selecteert met placeholders

    // echo "Product Code: " . $row['product_code'] . "<br>";

    // echo "Naam: " . $row['product_naam'] . "<br>";

    // echo "Prijs: " . $row['prijs_per_stuk'] . "<br>";

    // echo "Prijs: " . $row['omschrijving'] . "<br>";

    //-



    // Hoe je een single row selecteert met named parameters

    // echo "Product Code: " . $row['product_code'] . "<br>";

    // echo "Naam: " . $row['product_naam'] . "<br>";

    // echo "Prijs: " . $row['prijs_per_stuk'] . "<br>";

    // echo "Prijs: " . $row['omschrijving'] . "<br>";

    // -

?>

</tbody>

</table>

</body>

</html>