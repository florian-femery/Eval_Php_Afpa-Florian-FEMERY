<?php 
    // DB init. 
    require_once('../views/db_config.php');

    // Check imputs. 
    $file_path = '../views/'; 
    $error;
    if (empty($_POST['prod_ref']) || strlen($_POST['prod_ref']) > 10) {
        $error_ref = "Veuillez entrer une valeur de moins de 10 carractères"; 
        $error = true; 
    } elseif (in_array($_POST['prod_ref'], $db->getUsedRefs())) {
        $error_ref = "Cette reference est déjà utilisée par un produit"; 
        $error = true; 
    }

    if (empty($_POST['prod_lib']) || strlen($_POST['prod_lib']) > 200) {
        $error_lib = "Veuillez entrer une valeur de moins de 200 carractères"; 
        $error = true; 
    }

    if (!is_numeric($_POST['prod_pri'])) {
        $error_pri = "Veuillez entrer un prix valide"; 
        $error = true; 
    }

    if ($_POST['prod_sto'] < 0) {
        $error_sto = "Veuillez entrer '0' si aucun stock"; 
        $error = true; 
    }

    // Send data to DB. 
    $arguments = [':pro_cat_id' => $_POST['prod_cat'], 
                  ':pro_ref' => $_POST['prod_ref'],
                  ':pro_libelle' => $_POST['prod_lib'],
                  ':pro_description' => $_POST['prod_des'],
                  ':pro_prix' => $_POST['prod_pri'],
                  ':pro_stock' => $_POST['prod_sto'],
                  ':pro_couleur' => $_POST['prod_cou'],
                  ':pro_d_ajout' => $_POST['prod_dat_ajout'],
                  ':pro_bloque' => $_POST['prod_blo'] 
                ];

    $statement = "INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_d_ajout, pro_bloque)
    VALUES (:pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_d_ajout, :pro_bloque)";

    // Redirect and update.  
    if ($error) {
        include '../views/add_form.php'; 
    } else {
        $db->update($statement, $arguments); 
        header('location: ../views/list.php');
    }
?>