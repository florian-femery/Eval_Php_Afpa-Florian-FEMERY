<?php
     //Déclaration des variable des input.
    $last_name = filter_input(INPUT_POST, "user_lname"); 
    $first_name = filter_input(INPUT_POST, "user_fname"); 
    $gender = filter_input(INPUT_POST, "gender_radio"); 
    $birth = filter_input(INPUT_POST, "user_birth_date"); 
    $postal = filter_input(INPUT_POST, "user_pcode"); 
    $adress = filter_input(INPUT_POST, "user_adress"); 
    $city = filter_input(INPUT_POST, "user_city"); 
    $email = filter_input(INPUT_POST, "user_email"); 
    $subject = filter_input(INPUT_POST, "subject"); 
    $question = filter_input(INPUT_POST, "user_question"); 
    
     //Déclaration du conteur d'eurreur.
    $error_count = 0;
    

     //Vérification des input.
    if(empty($last_name)) {
        $last_name_error = "Veuillez entrer votre nom."; 
        $error_count++;
    } 

    if(empty($first_name)) {
        $first_name_error = "Veuillez entrer votre prénom.";
        $error_count++; 
    }

    if(empty($gender)){
        $gender_error = "Veuillez selectionée votre sexe.";
        $error_count++;
    }

    if(empty($birth)) {
        $birth_error = "Veuillez entrer votre date de naissance.";
        $error_count++; 
    }
    if(preg_match("/^[0-9]{2}+[-]{1}+[0-9]{2}+[-]+[0-9]{4}$/", $birth) < 1) {
        $birth_error = "Veuillez entrer une date de naissance valide.";
        $error_count++; 
    }

    if (strlen($postal) != 5) {
        $postal_error = "Code postal invalide : Veuillez saisir 5 chiffres.";
        $error_count++;
    }

    if(empty($adress)){
        $address_error ="Address invalide.";
        $error_count++;
    }

    if(empty($city)){
        $ville_error ="Ville incalide";
        $error_count++;
    }

    if(preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w]{2,4}$/", $email) < 1) {
        $email_error = "Veuillez entrer une adresse email valide.";
        $error_count++; 
    }

    if ($subject === "Veuillez sélectionner un sujet") {
        $subject_error = "Veuillez selectionner un sujet.";
        $error_count++;
    }

    if (strlen($question) < 5) {
        $question_error = "Valeur invalide : Question trop courte.";
        $error_count++;
    }

    if (!isset($_POST["user_agree"])) {
        $agree_error = "Condition obligatoire pour l'envoi des données.";
        $error_count++;
    }

    if ($error_count === 0) {
        header('location: ../index.php');
    } else header('location: ../views/Formulaire.php');
?>