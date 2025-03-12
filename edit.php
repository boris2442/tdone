<?php

require_once "connexion.php";



var_dump($_GET['id']);
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=?";
    $result = $db->prepare($query);
    $result->execute([$id]);
    $user = $result->fetch();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="contains" id="container">

        <form action="" method="post" class="form1">


            <div class="">
                <label for="name">Entrer votre nom</label>
                <input type="text" name="name" placeholder="SIMO AUBIN" value="<?= $user["name"]; ?> ">
            </div>
            <div class="">
                <label for="email">Entrer votre email</label>
                <input type="email" name="email" placeholder="aubinborissimotsebo@gmail.com" value="<?= $user['email']; ?>">
            </div>
            <div class="">
                <label for="textarea">Laisser un message</label>
                <textarea name="message" id="textarea" value=""><?= $user['message']; ?></textarea>
            </div>
            
                <input type="submit" value="Editer">
            
        </form>

    </div>
</body>

</html>