<?php

require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->get("/camper", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM tb_camper");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    // print_r(file_get_contents("php://input"));
});

$router->post("/camper", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO tb_camper(nombre, edad) VALUES(:name, :age)");
    $res->bindValue('name', $_DATA['name']);
    $res->bindValue('age', $_DATA['age']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
    // print_r(file_get_contents("php://input"));
});


$router->put("/camper", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE tb_camper SET nombre = :name WHERE id = :id;");
    $res->bindValue('name', $_DATA['name']);
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/camper", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM tb_camper WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
    // print_r(file_get_contents("php://input"));
});



$router->run();

?>