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
                        <div class="m-3 ms-0">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email">
                        </div>
                        <div class="m-3 ms-0">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua senha">
                        </div>
                        <input type="submit" class="btn btn-warning" value="Entrar">
                    </form>
                </div>
                <div class="col-md-4" id="login-container">
                    <h2>Criar conta</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="type" value="register">
                        <div class="m-3 ms-0">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email">
                        </div>
                        <div class="m-3 ms-0">
                            <label for="name">Nome:</label>
                            <input type="name" class="form-control" id="name" name="password" placeholder="Digite o seu nome">
                        </div>
                        <div class="m-3 ms-0">
                            <label for="lastname">Sobrenome:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite o seu sobrenome">
                        </div>
                        <div class="m-3 ms-0">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua senha">
                        </div>
                        <div class="m-3 ms-0">
                            <label for="confirm-password">Confirme a sua senha:</label>
                            <input type="confirm-password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirme a sua senha">
                        </div>
                        <input type="submit" class="btn btn-warning" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once('./templates/footer.php')
?>