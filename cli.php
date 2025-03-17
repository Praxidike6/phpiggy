<?php

include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;


$db = new Database(
    "mysql",
    [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'phpiggy'
    ],
    'root',
    ''

);

$sqlFile = file_get_contents("./database.sql");


$db->connection->query($sqlFile);

    /*    $db->connection->beginTransaction();
    $db->connection->query("INSERT INTO products VALUES(99,'Gloves')");

    $db->$search = 'Hats';
    $query = "SELECT * FROM products WHERE name= :name";



    $stmt = $db->connection->prepare($query);
    $stmt->bindValue('name', 'Gloves', PDO::PARAM_STR);
    $stmt->execute();

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
    $db->connection->commit(); */
