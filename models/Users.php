<?php
class User
{
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $img;
    public $bio;
    public $token;
}

interface UserDAOInterface
{
    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function autenticateUser($email, $password);
    public function findByEmail($data);
    public function findById($id);
    public function findByToken($token);
    public function changePassword(User $user);
}
