<?php
   require_once "./connexion.php";
   $sql="SELECT* FROM `users` ";
   $requete=$db->query($sql);
   $users=$requete->fetchAll();

?>


<?php
$title="table";
    require_once "includes/header.php";
    ?>
    <table border="3">
        <caption>fiche de recueillement</caption>
        <thead>
            <tr>
                <th>id</th>
          
                <th>Nom</th>
                <th>email</th>
                <th>Message</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
          <?php  foreach($users as $user): ?>
            <tr>
                <td><?php echo $user["id"] ?></td>
                <td><?php  echo $user["name"]?></td>
                <td><?php  echo $user["email"]?></td>
                <td><?php  echo $user["message"]?></td>
                <td><a href="edit.php?id=<?=$user['id']?>" name="update">Editer</a></td>
                <td><a href="delete.php?id=<?=$user['id']?>" name="delete">supprimer</a></td>
             
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
require_once "includes/footer.php";

?>