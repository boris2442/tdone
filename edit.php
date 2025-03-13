<?php

require_once "connexion.php";




if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=?";
    $result = $db->prepare($query);
    $result->execute([$id]);
    $user = $result->fetch();
}

// if (isset($_POST["update"])) {
//     $id = intval($_GET['$id']);
//     $name = htmlspecialchars($_POST['name']);
//     $email = htmlspecialchars($_POST['email']);
//     $message = htmlspecialchars($_POST['message']);

//     $sql = "UPDATE `users` SET name=?, email=?, message=? WHERE id=? ";
//     $requete = $db->prepare($sql);
//     // $requete->execute([$name, $email, $message, $id]);
//     if ($requete->execute([$name, $email, $message, $id])) {
//         echo "mise a jour reussie dans la database";
//     } else {
//         echo "echec de la mise a jour dans la database";
//     }
// }
if(isset($_POST['update'])){
    $id = intval($_GET['id']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

$sql = "update users set email = :email, name = :name, message = :message where id = :id";
$prepare = $db->prepare($sql);
$execute  = $prepare->execute([
    ':id'=>$id,
    ':name'=>$name,
    ':email'=>$email,
    ':message'=>$message,
]);
 header('location:table.php');
}


?>


<?php
$title = "editer";
include_once "includes/header.php";
?>
<div class="contains" id="container">

    <form  method="post" class="form1">


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
            <textarea name="message" id="textarea" ><?= $user['message']; ?></textarea>
        </div>

        <input type="submit" value="Editer" name='update'>

    </form>

</div>
<?php
require_once "includes/footer.php";

?>