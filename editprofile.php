<?php
require_once('templates/header.php');
require_once('dao/UserDAO.php');

$userDAO = new UserDAO($conn, $BASE_URL);

$userData = $userDAO->verifyToken(true);
?>

<main>
    <div id="main-container" class="container-fluid">
        <h1>buga nao cao</h1>
    </div>
</main>

<?php
require_once('templates/footer.php')
?>