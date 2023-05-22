<?php 
//VAR DUMP TO PRINT OUT
//var_dump($_SERVER["REQUEST_URI"]);

//use explode to print
declare(strict_types=1);
spl_autoload_register(function($class){
require __DIR__ . "/src/$class.php";
});
set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");
header("Content-type: application/json; charset=UTF-8");
$parts=explode("/",$_SERVER["REQUEST_URI"]);
print_r($parts);
//check to see the right wildcard is passed
if ($parts[1]!="project"){
    http_response_code(404);
    exit;
}

$id=$parts[2] ?? null;
$database=new Database("localhost", "product_db", "root","root");
$gateway=new ProductGateway($database);
$database->getConnection();
$controller =  new ProductController($gateway);
$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
//var_dump($id);
?>