<?php 
    // DB init. 
    require '../controllers/Database.php';
    use App\Database; 
    $db = new Database('jarditou'); 

    // Deleting Datas from DB
    $produits = $db->delete("DELETE FROM produits WHERE pro_id = ?", [$_POST['pro_id']]); 

    // Redirect. 
    header('location: ../views/list.php');
?>