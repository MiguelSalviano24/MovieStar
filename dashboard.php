<?php
require_once("templates/header.php");

// Verifica se usuário está autenticado
require_once("models/Users.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");

$user = new User();
$userDAO = new UserDAO($conn, $BASE_URL);
$movieDAO = new MovieDAO($conn, $BASE_URL);

$userData = $userDAO->verifyToken(true);

$userMovies = $movieDAO->getMoviesByUserId($userData->id);

?>
<div id="main-container" class="container-fluid">
    <h2 class="section-title">Dashboard</h2>
    <p class="section-description">Adicione ou atualize as informações dos filmes que você enviou</p>

    <div class="row mb-3">
        <div class="col-12 text-end mt-3" id="add-movie-container">
            <a href="<?= $BASE_URL ?>newmovie.php" class="btn btn-success">
                <i class="fas fa-plus"></i> Adicionar Filme
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12" id="movies-dashboard">
            <table class="table table-striped table-hover table-dark">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Nota</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userMovies as $movie): ?>
                        <tr>
                            <td scope="row"><?= $movie->id ?></td>
                            <td>
                                <a href="<?= $BASE_URL ?>movie.php?id=<?= $movie->id ?>" class="table-movie-title text-decoration-none">
                                    <?= $movie->title ?>
                                </a>
                            </td>
                            <td><i class="fas fa-star text-warning"></i> <?= $movie->rating ?></td>
                            <td class="text-center">
                                <a href="<?= $BASE_URL ?>editmovie.php?id=<?= $movie->id ?>" class="btn btn-sm btn-warning me-2">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="<?= $BASE_URL ?>movie-process.php" method="POST" class="d-inline">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $movie->id ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-times"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once("templates/footer.php");
?>