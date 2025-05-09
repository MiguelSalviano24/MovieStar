<?php
require_once('globals.php');
require_once('db.php');
require_once('models/Message.php');
require_once('dao/UserDAO.php');


$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if (!empty($flassMessage['msg'])) {

    $message->clearMessage();
}

$userDAO = new UserDAO($conn, $BASE_URL);

$userData = $userDAO->verifyToken(false);

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <title>Moviestar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="short icon" href="<?= $BASE_URL ?>img/users/logo.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/import.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>index.php" class="navbar-brand">
                <img src="<?= $BASE_URL ?>img/users/logo.svg" alt="Moviestar" id="logo">
                <span id="moviestar-title">MovieStar</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div>
                <div class="mb-3">
                    <form action="" method="GET" id="search-form" class="my-2 my-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-md" placeholder="Buscar Filmes" aria-label="Buscar Filmes" name="q">
                            <button class="btn btn-default" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <?php if ($userData): ?>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>newmovie.php" class="nav-link">
                                <i class="far fa-plus-square"></i> Incluir Filme
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">Meus Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                                <?= $userData->name ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Sair</a>
                        </li>
                    <?php else: ?>
                        <div class="login">
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar</a>
                            </li>
                        </div>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <?php if (!empty($flassMessage['msg'])): ?>
        <div class="msg-container">
            <p class="msg <?= $flassMessage['type'] ?>"><?= $flassMessage['msg'] ?></p>
        </div>
    <?php endif; ?>