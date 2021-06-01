<?php 
     // DB init. 
    require '../controllers/Database.php';
    use App\Database; 
    $db = isset($db) ? $db : new Database('jarditou'); 
?>