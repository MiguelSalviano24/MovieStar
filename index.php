</php
    require_once('globals.php');
    require_once('db.php');
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
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>" class="navbar-brand">
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
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>auth.php" class="nav-link">Entrar | Cadastrar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="main-container" class="container-fluid">
            <h1>Corpo do site</h1>
        </div>
    </main>
    <footer id="footer">
        <div class="social-container">
            <ul>
                <li>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-github"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
        <div id="footer-links-container">
            <ul>
                <li>Adicionar filmes</li>
                <li>Adicionar crítica</li>
                <li>Entrar/Registrar</li>
            </ul>
        </div>
        <p>&copy; 2025 Miguel Salviano</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>