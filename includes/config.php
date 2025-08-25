<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//URL
$base_url = $_ENV['APP_URL'];

//database connection
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$db = $_ENV['DB_NAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

//mailer
$mailconfig = [
    'host' => $_ENV['MAIL_HOST'],
    'port' => $_ENV['MAIL_PORT'],
    'username' => $_ENV['MAIL_USERNAME'],
    'password' => $_ENV['MAIL_PASSWORD'],
    'encryption' => $_ENV['MAIL_ENCRYPTION'],
    'from' => $_ENV['MAIL_FROM'],
    'from_name' => $_ENV['MAIL_FROM_NAME']
];

try{
    $conn = new PDO("mysql:host=$host:$port; dbname=$db", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
}

$jwt_token = $_ENV['JWT_SECRET'];