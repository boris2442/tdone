<?php
if (!empty($_POST)) {
    if (
        isset($_POST['name'], $_POST['email'], $_POST['message'])
        && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])
    ) {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        require_once "./connexion.php";

        $sql = "INSERT INTO `users`(`name`, `email`, `message`)VALUES(:name, :email, :message)";
        $requete = $db->prepare($sql);
        $requete->bindValue(':name', $name, PDO::PARAM_STR_CHAR);
        $requete->bindValue(':email', $email, PDO::PARAM_STR_CHAR);
        $requete->bindValue(':message', $message, PDO::PARAM_STR_CHAR);
        $requete->execute();
    }
}

?>


    <?php
    $title="home";
    require_once "includes/header.php";
    ?>
    <div class="contains" id="container">
        <form action="table.php" method="post" class="form1">
            <div class="">
                <label for="name">Entrer votre nom</label>
                <input type="text" name="name" placeholder="SIMO AUBIN">
            </div>
            <div class="">
                <label for="email">Entrer votre email</label>
                <input type="email" name="email" placeholder="aubinborissimotsebo@gmail.com">
            </div>
            <div class="">
                <label for="textarea">Laisser un message</label>
                <textarea name="message" id="textarea"></textarea>
            </div>
            <input type="submit" value="Ajouter">
        </form>
        <!-- <table border="3">
            <caption>fiche de recueillement</caption>
            <thead>
                <tr>
                    <th>id</th>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Message</th>
                    <th>Editer</th>
                    <th>SUpprimer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table> -->
    </div>
    <?php
require_once "includes/footer.php";

?>