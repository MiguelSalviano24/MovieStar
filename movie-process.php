<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Movie.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn, $BASE_URL);
$movieDAO = new MovieDAO($conn, $BASE_URL);

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// Resgata dados do usuário
$userData = $userDAO->verifyToken();

if ($type === "create") {

    // Receber os dados dos inputs
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $duration = filter_input(INPUT_POST, "duration");

    $movie = new Movie();

    // Validação mínima de dados
    if (!empty($title) && !empty($description) && !empty($category)) {

        $movie->title = $title;
        $movie->description = $description;
        $movie->trailer = $trailer;
        $movie->category = $category;
        $movie->duration = $duration;
        $movie->users_id = $userData->id;

        // Upload de imagem do filme
        if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

            $image = $_FILES["image"];
            $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];

            // Checando tipo da imagem
            if (in_array($image["type"], $imageTypes)) {

                // Checa se imagem é jpg
                if (in_array($image["type"], $jpgArray)) {
                    $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                } else {
                    $imageFile = imagecreatefrompng($image["tmp_name"]);
                }

                // Gerando o nome da imagem
                $imageName = $movie->imageGenerateName();

                imagejpeg($imageFile, "./img/movies/" . $imageName, 100);

                $movie->img = $imageName;
            } else {

                $message->setMessage("Tipo inválido de imagem, insira png ou jpg!", "error", "back");
            }
        }

        $movieDAO->create($movie);
    } else {

        $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria!", "error", "back");
    }
} else if ($type === "delete") {

    // Recebe os dados do form
    $id = filter_input(INPUT_POST, "id");

    $movie = $movieDAO->findById($id);

    if ($movie) {

        // Verificar se o filme é do usuário
        if ($movie->users_id === $userData->id) {

            $movieDAO->destroy($movie->id);
        } else {

            $message->setMessage("Informações inválidas!", "error", "index.php");
        }
    } else {

        $message->setMessage("Informações inválidas!", "error", "index.php");
    }
} else if ($type === "update") {

    // Receber os dados dos inputs
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $duration = filter_input(INPUT_POST, "duration");
    $id = filter_input(INPUT_POST, "id");

    $movieData = $movieDAO->findById($id);

    // Verifica se encontrou o filme
    if ($movieData) {

        // Verificar se o filme é do usuário
        if ($movieData->users_id === $userData->id) {

            // Validação mínima de dados
            if (!empty($title) && !empty($description) && !empty($category)) {

                // Edição do filme
                $movieData->title = $title;
                $movieData->description = $description;
                $movieData->trailer = $trailer;
                $movieData->category = $category;
                $movieData->duration = $duration;

                // Upload de imagem do filme
                if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

                    $image = $_FILES["image"];
                    $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
                    $jpgArray = ["image/jpeg", "image/jpg"];

                    // Checando tipo da imagem
                    if (in_array($image["type"], $imageTypes)) {

                        // Checa se imagem é jpg
                        if (in_array($image["type"], $jpgArray)) {
                            $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                        } else {
                            $imageFile = imagecreatefrompng($image["tmp_name"]);
                        }

                        // Gerando o nome da imagem
                        $movie = new Movie();

                        $imageName = $movie->imageGenerateName();

                        imagejpeg($imageFile, "./img/movies/" . $imageName, 100);

                        $movieData->img = $imageName;
                    } else {

                        $message->setMessage("Tipo inválido de imagem, insira png ou jpg!", "error", "back");
                    }
                }

                $movieDAO->update($movieData);
            } else {

                $message->setMessage("Você precisa adicionar pelo menos: título, descrição e categoria!", "error", "back");
            }
        } else {

            $message->setMessage("Informações inválidas!", "error", "index.php");
        }
    } else {

        $message->setMessage("Informações inválidas!", "error", "index.php");
    }
} else {

    $message->setMessage("Informações inválidas!", "error", "index.php");
}
