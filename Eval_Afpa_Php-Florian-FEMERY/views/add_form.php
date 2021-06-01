<?php 
     // Class Init. 
    require '../controllers/table/Produit.php'; 
    use App\Table\Produit; 
    require '../controllers/table/Categorie.php'; 
    use App\Table\Categorie; 
    require '../controllers/App.php'; 
    use App\App; 

     // DB init. 
    require_once('db_config.php');

     // Getting data from DB. 
    $produits = $db->query("SELECT * FROM produits JOIN categories  ON categories.cat_id = produits.pro_cat_id",'App\Table\Produit'); 
    $categories = $db->query("SELECT DISTINCT * FROM categories", 'App\Table\Categorie'); 
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajouter - Jarditou</title>
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
							<a class="nav-link active" href="<?= isset($file_path) ? $file_path : ''; ?>list.php">Produits</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="<?= isset($file_path) ? $file_path : ''; ?>Formulaire.php" aria-disabled="true">Contact</a>
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

        <h1 class="mt-5">Ajout d'un produit à la base de donnée</h1>
        <form action="../models/add_script.php" method="post" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="prod_ref" class="mb-2">Référence* :</label>
                <input type="text" class="form-control" id="prod_ref" name="prod_ref" value="<?= isset($_POST['prod_ref']) ? $_POST['prod_ref'] : ""; ?>">
                <p class="text-danger"><?php echo isset($error_ref) ? $error_ref : '' ;?></p>
            </div>

            <div class="form-group mt-4">
                <label for="prod_cat" class="mb-2">Catégorie* :</label>
                    <select class="form-control" id="prod_cat" name="prod_cat">
                        <?php foreach($categories as $categorie) : ?>
                        <option value = <?= $categorie->cat_id ?>><?= $categorie->cat_nom ?></option>
                        <?php endforeach; ?> 
                    </select>
            </div>

            <div class="form-group mt-4">
                <label for="prod_lib" class="mb-2">Libellé* :</label>
                <input type="text" class="form-control" id="prod_lib" name="prod_lib" value="<?= isset($_POST['prod_lib']) ? $_POST['prod_lib'] : ""; ?>">
                <p class="text-danger"><?php echo isset($error_lib) ? $error_lib : '' ;?></p>
            </div>

            <div class="form-group mt-4">
                <label for="prod_des" class="mb-2">Description :</label>
                <textarea class="form-control" id="prod_des" rows="3" name="prod_des"><?= isset($_POST['prod_des']) ? $_POST['prod_des'] : ""; ?></textarea>
            </div>

            <div class="form-group mt-4">
                <label for="prod_pri" class="mb-2">Prix* :</label>
                <input type="text" class="form-control" id="prod_pri" name="prod_pri" value="<?= isset($_POST['prod_pri']) ? $_POST['prod_pri'] : ""; ?>">
                <p class="text-danger"><?php echo isset($error_pri) ? $error_pri : '' ;?></p>
            </div>

            <div class="form-group mt-4">
                <label for="prod_sto" class="mb-2">Stock* :</label>
                <input type="number" class="form-control" id="prod_sto" name="prod_sto" value="<?= isset($_POST['prod_sto']) ? $_POST['prod_sto'] : 0; ?>">
                <p class="text-danger"><?php echo isset($error_sto) ? $error_sto : '' ;?></p>
            </div>

            <div class="form-group mt-4">
                <label for="prod_cou" class="mb-2">Couleur :</label>
                <input type="text" class="form-control" id="prod_cou" name="prod_cou" value="<?= isset($_POST['prod_cou']) ? $_POST['prod_cou'] : ""; ?>">
            </div>

            <div class="form-group mt-4">
                <p class="mb-2">Produit bloqué* ?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_oui" value="1">
                        <label class="form-check-label" for="prod_blo_oui">Oui</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prod_blo" id="prod_blo_non" value="0" checked>
                        <label class="form-check-label" for="prod_blo_non">Non</label>
                    </div>
            </div>

            <div class="form-group mt-4">
                <label for="prod_dat_ajout" class="mb-2">Date d'ajout :</label>
                <input type="text" class="form-control" id="prod_dat_ajout" name="prod_dat_ajout" value="<?php echo App::getDate();?>" readonly>
            </div>

            <div class="my-5">
                <a href="list.php" class="btn btn-secondary btn-lg">Retour</a>
                <button type="submit" class="btn btn-success btn-lg">Ajouter le produit</button>
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

		<!-- Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>