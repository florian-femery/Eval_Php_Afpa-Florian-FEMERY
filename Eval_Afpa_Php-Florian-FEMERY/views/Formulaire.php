<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact - Jarditou</title>
         <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>

    <body class="container">
        <header class="d-none d-lg-flex m-2 justify-content-between align-content-center">
             <!-- ../pages/img/jarditou_logo.jpg -->
            <img src="<?= isset($file_path) ? $file_path : ''; ?>img/jarditou_logo.jpg" alt="logo jarditou.com" class="" height="50">
            <p class="fs-4 my-auto mx-5">Tout le jardin</p>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Jarditou.com</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../index.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= isset($file_path) ? $file_path : ''; ?>list.php">Produits</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?= isset($file_path) ? $file_path : ''; ?>Formulaire.php" >Contact</a>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="row">
             <!-- ../pages/img/promotion.jpg -->
            <img src="<?= isset($file_path) ? $file_path : ''; ?>img/promotion.jpg" class="img-fluid" alt="promo image">
        </div>

        <p>* Ces zones sont obligatoires</p>
        <form action="Verif_formulaire.php" method="post" id="envoie">
            <h2>Vos coordonnées</h2>
            <div class="form-group">
                <label for="user_lname" class="mb-2">Nom*</label>
                <input type="text" class="form-control" id="user_lname" name="user_lname" placeholder="Veuillez saisir votre nom" value="<?= isset($last_name) ? htmlspecialchars($last_name) : "";?>">
                <span class="text-danger"><p id="missName"></p><?php if (isset($last_name_error)) echo "$last_name_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_fname" class="my-2">Prénom*</label>
                <input type="text" class="form-control" id="user_fname" name="user_fname" placeholder="Veuillez saisir votre prénom" value="<?= isset($first_name) ? htmlspecialchars($first_name) : "";?>">
                <span class="text-danger"><p id="missFname"></p><?php if (isset($first_name_error)) echo "$first_name_error"; ?></span>
            </div>

            <div class="form-group">
                <p>Sexe*</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender_radio" id="gender_radio_female" value="Mme">
                        <label class="form-check-label" for="gender_radio_female">Féminin</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender_radio" id="gender_radio_male" value="M.">
                        <label class="form-check-label" for="gender_radio_male">Masculin</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender_radio" id="gender_radio_neutral" value="M.Mme" >
                        <label class="form-check-label" for="gender_radio_neutral">Neutre</label>
                    </div>
                <span class="text-danger"><p id="missGenre"></p><?php if (isset($gender_error)) echo "$gender_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_birth_date" class="my-2">Date de Naissance*</label>
                <input type="date" class="form-control" id="user_birth_date" name="user_birth_date" placeholder="jour-mois-année" value="<?= isset($birth) ? htmlspecialchars($birth) : "";?>">
                <span class="text-danger"><p id="missDate"></p><?php if (isset($birth_error)) echo "$birth_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_pcode" class="my-2">Code Postal*</label>
                <input type="number" class="form-control" id="user_pcode" name="user_pcode" value="<?= isset($postal) ? htmlspecialchars($postal) : "";?>">
                <span class="text-danger"><p id="missCP"></p><?php if (isset($postal_error)) echo "$postal_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_adress" class="my-2">Adresse</label>
                <input type="text" class="form-control" id="user_adress" name="user_adress" value="<?= isset($adress) ? htmlspecialchars($adress) : "";?>">
                <span class="text-danger"><p id="missAdr"></p><?php if (isset($address_error)) echo "$address_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_city" class="my-2">Ville</label>
                <input type="text" class="form-control" id="user_city" name="user_city" value="<?= isset($city) ? htmlspecialchars($city) : "";?>">
                <span class="text-danger"><p id="missCity"></p><?php if (isset($ville_error)) echo "$ville_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_email" class="my-2">Email*</label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="<?= isset($email) ? htmlspecialchars($email) : "";?>">
                <span class="text-danger"><p id="missMail"></p><?php if (isset($email_error)) echo "$email_error"; ?></span>
            </div>

            <h2 class="my-2">Votre demande</h2>
            <div class="form-group">
                <label for="subject_select" class="my-2">Sujet*</label>
                    <select class="form-control" id="subject_select" name="subject" value="<?= isset($subject) ? htmlspecialchars($subject) : "";?>">
                        <option>Veuillez sélectionner un sujet</option>
                        <option>Réclamation</option>
                        <option>Remboursement</option>
                        <option>Echange</option>
                        <option>Question sur un produit</option>
                    </select>
                <span class="text-danger"><p id="missSuj"></p><?php if (isset($subject_error)) echo "$subject_error"; ?></span>
            </div>

            <div class="form-group">
                <label for="user_question" class="my-2">Votre question*</label>
                <textarea class="form-control" id="user_question" name="user_question" rows="3"><?= isset($question) ? htmlspecialchars($question) : "";?></textarea>
                <span class="text-danger"><p id="missQuestion"></p><?php if (isset($question_error)) echo "$question_error"; ?></span>
            </div>

            <div class="form-check form-check-inline my-2">
                <input class="form-check-input" type="checkbox" id="user_agreements" name="user_agree" value="true">
                <label class="form-check-label" for="user_agreements">J'accepte le traitement informatique de ce formulaire</label> <br>
                <span class="text-danger"><p id="errAccept"></p><?php if (isset($agree_error)) echo "$agree_error"; ?></span>
            </div>

            <div class="form-group my-3">
                <button type="submit" id="send" class="btn btn-dark">Envoyer</button>
                <button type="reset" class="btn btn-dark">Annuler</button>
            </div>
        </form>

        <nav class="navbar navbar-dark bg-dark mt-2 navbar-expand-sm">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto b-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link">mentions légales</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">horaires</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">plan du site</a>
                    </li>
                </ul>
            </div>
        </nav>

        <script src="Js/Eval_Formulaire-Javascript.js"></script>
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    </body>
</html>