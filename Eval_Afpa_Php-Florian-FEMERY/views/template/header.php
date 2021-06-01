<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Jarditou</title>
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
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?= isset($file_path) ? $file_path : ''; ?>list.php">Produits</a>
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