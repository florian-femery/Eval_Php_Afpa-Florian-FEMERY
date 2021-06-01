<?php 
     // Claass Init.
    require '../controllers/table/Produit.php'; 
    use App\Table\Produit; 

     // DB Init.
    require '../controllers/Database.php';
    use App\Database; 
    $db = new Database('jarditou'); 

     // Getting datas from DB. 
    $produits = $db->prepare("SELECT * FROM produits JOIN categories ON categories.cat_id = produits.pro_cat_id WHERE pro_id = ?  ", [$_GET['pro_id']],'App\Table\Produit', true); 
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Détails Produits - Jarditou</title>
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

        <div class="text-center mt-3">
            <img src="<?= $produits->getIMG() ?>" alt="" width="250">
        </div>

        <form action="controllers/add_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group mt-4">
                <label for="prod_ref" class="mb-2">Référence :</label>
                <input type="text" class="form-control" id="prod_ref" name="prod_ref" value="<?= $produits->pro_ref?>" readonly>
            </div>

            <div class="form-group mt-4">
                <label for="prod_cat" class="mb-2">Catégorie :</label>
                <selet class="form-control" id="prod_cat" name="prod_cat" readonly>
                    <!-- <?php foreach($categories as $categorie) : ?>
                    <option value = <?= $categorie->cat_id ?>><?= $categorie->cat_nom ?></option>
                    <?php endforeach; ?> -->
                    <option value = <?= $produits->cat_id ?>><?= $produits->cat_nom ?>
                </select>
            </div>

            <div class="form-group mt-4">
                <label for="prod_lib" class="mb-2">Libellé :</label>
               <input type="text" class="form-control" id="prod_lib" name="prod_lib" value="<?= $produits->pro_libelle?>" readonly>
            </div>

            <div class="form-group mt-4">
                <label for="prod_des" class="mb-2">Description :</label>
                <textarea class="form-control" id="prod_des" rows="3" name="prod_des" readonly><?= $produits->pro_description ?></textarea>
            </div>

            <div class="form-group mt-4">
                <label for="prod_pri" class="mb-2">Prix :</label>
                <input type="text" class="form-control" id="prod_pri" name="prod_pri" value="<?= $produits->pro_prix . " €";?>" readonly>
            </div>

            <div class="form-group mt-4">
                <label for="prod_sto" class="mb-2">Stock :</label>
                <input type="text" class="form-control" id="prod_sto" name="prod_sto" value="<?= $produits->pro_stock?>" readonly>
            </div>

            <div class="form-group mt-4">
                <label for="prod_cou" class="mb-2">Couleur</label>
                <input type="text" class="form-control" id="prod_cou" name="prod_cou" value="<?= $produits->pro_couleur?>" readonly>
            </div>

            <div class="form-group mt-4">
                <p class="mb-2">Produit bloqué ?</p><?= $produits->radioBlocked(); ?>
            </div>

            <div class="form-group mt-4">
                <label for="prod_dat" class="mb-2">Date d'ajout :</label>
                <input type="date" class="form-control" id="prod_dat" name="prod_dat" value="<?= $produits->pro_d_ajout?>" readonly>
            </div>

            <div class="form-group mt-4">
                <label for="prod_dat_mod" class="mb-2">Date de modification :</label>
                <input type="text" class="form-control" id="prod_dat_mod" name="prod_dat_mod" value="<?= str_replace('-', '/', $produits->getDate());?>" readonly>
            </div>
        </form>

        <div class="my-5">
            <a href="list.php" class="btn btn-secondary  shadow-sm">Retour</a>
            <a href="update_form.php?pro_id=<?= $produits->pro_id ?>" class="btn btn-warning  shadow-sm">Modifier</a>
            <a href="delete_form.php?pro_id=<?= $produits->pro_id ?>" class="btn btn-danger  shadow-sm">Supprimer</a>
        </div>

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