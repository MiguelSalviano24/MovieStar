<?php
require_once("templates/header.php");

// Verifica se usuário está autenticado
require_once("models/Users.php");
require_once("dao/UserDAO.php");

$user = new User();
$userDAO = new UserDAO($conn, $BASE_URL);

$userData = $userDAO->verifyToken(true);

?>
<div id="main-container" class="container-fluid">
    <div class="offset-md-4 col-md-4 new-movie-container">
        <h1 class="page-title">Adicionar Filme</h1>
        <p class="page-description">Adicione sua crítica e compartilhe com o mundo!</p>
        <form action="<?= $BASE_URL ?>movie-process.php" id="add-movie-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="m-3 ms-0">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do seu filme">
            </div>
            <div class="m-3 ms-0">
                <label for="length">Duração:</label>
                <input type="text" class="form-control" id="length" name="length" placeholder="Digite a duração do filme">
            </div>
            <div class="m-3 ms-0">
                <label for="category">Categoria:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Selecione</option>
                    <option value="Ação">Ação</option>
                    <option value="Drama">Drama</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Fantasia / Ficção">Fantasia / Ficção</option>
                    <option value="Romance">Romance</option>
                    <option value="Romance">Terror</option>
                </select>
            </div>
            <div class="m-3 ms-0">
                <label for="trailer">Trailer:</label>
                <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer">
            </div>
            <div class="m-3 ms-0">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" rows="2" class="form-control" placeholder="Descreva o filme..."></textarea>
            </div>
            <div class="m-3 ms-0">
                <label for="image">Imagem:</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <input type="submit" class="btn card-btn" value="Adicionar filme">
        </form>
    </div>
</div>
<?php
require_once("templates/footer.php");
?>