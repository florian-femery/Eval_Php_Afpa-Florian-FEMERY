<?php 
    // DB init.
    require_once('../views/db_config.php');

    // Setting default img & filepath.  
    $extension = 'jpg'; 
    $file_path = '../views/'; 
    $error;
    
    // Form validation. 
    if (empty($_POST['prod_ref']) || strlen($_POST['prod_ref']) > 10) {
        $error_ref = "Veuillez entrer une valeur de moins de 10 carractères"; 
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

    //File handling. 
    if($_FILES['prod_pic']['error'] == 0){
        // allowed img extensions
        $autorised_mime_types = ["image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff"];

        //img extension extraction
        $finfo = finfo_open(FILEINFO_MIME_TYPE); 
        $mime_type = finfo_file($finfo, $_FILES["prod_pic"]["tmp_name"]); 
        finfo_close($finfo);

        // extenstion validation
        if (in_array($mime_type, $autorised_mime_types)) {
        //naming. 
        $pro_id = $_POST["prod_id"];
        $extension = substr(strrchr($_FILES["prod_pic"]["name"], "."), 1);

        // mooving from tmp
        move_uploaded_file($_FILES["prod_pic"]["tmp_name"], "../pages/img/$pro_id.$extension");
        } else {
            echo "Erreur, type de fichier non autorisé.<br>";
            exit; 
        };
    }

    // prepared arguments for sql querry. 
    $arguments = [$_POST['prod_cat'], 
                  $_POST['prod_ref'], 
                  $_POST['prod_lib'], 
                  $_POST['prod_des'], 
                  $_POST['prod_pri'], 
                  $_POST['prod_sto'], 
                  $_POST['prod_cou'], 
                  $extension, 
                  $_POST['prod_dat_mod'], 
                  $_POST['prod_blo'],
                  $_POST['prod_id']  
                 ];

    // REDIRECTION 
    if ($error) {
        include '../views/update_form.php'; 
    } else {
    
        // Récuperation des données. 
        $db->update("UPDATE produits SET pro_cat_id = ?,
                                         pro_ref = ? ,
                                         pro_libelle = ? ,
                                         pro_description = ? ,
                                         pro_prix = ? ,
                                         pro_stock = ? ,
                                         pro_couleur = ? ,
                                         pro_photo = ? ,
                                         pro_d_modif = ? ,
                                         pro_bloque = ? WHERE pro_id = ? ",
                                         $arguments); 

        // redirection
        header('location: ../views/list.php');
    }
?>