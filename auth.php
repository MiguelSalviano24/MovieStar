<?php
require_once('./templates/header.php')
?>

<main>
    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-4" id="login-container">
                    <h2>Entrar</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="type" value="login">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o seu email">
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua senha">
                            <p></p>
                        </div>
                        <input type="submit" class="btn btn-warning" value="Entrar">
                    </form>
                </div>
                <div class="col-md-4" id="login-container">
                    <h2>Criar conta</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="type" value="register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once('./templates/footer.php')
?>