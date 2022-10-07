<?php
$username = 'root';
$password = 'root';
try {
  $pdo  = new PDO('mysql:host=127.0.0.1;dbname=pool', $username, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>