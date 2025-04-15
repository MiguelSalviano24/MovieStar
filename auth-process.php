<?php
require_once('models/Users.php');
require_once('models/Message.php');
require_once('dao/UserDAO.php');
require_once('globals.php');
require_once('db.php');

$message = new Message($BASE_URL);


// Resgate o tipo de formulário
$type = filter_input(INPUT_POST, 'type');

// Verifica o tipo do formulário
if ($type === 'register') {

    $name = filter_input(INPUT_POST, 'name');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $confirmpassword = filter_input(INPUT_POST, 'confirmpassword');

    if ($name && $lastname && $email && $password) {

        if ($password === $confirmpassword) {
        } else {
            $message->setMessage("As senhas não coincidem", "error", "back");
        }
    } else {
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }
} else if ($type === 'login') {
}
