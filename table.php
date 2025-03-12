<?php
   require_once "./connexion.php";
   $sql="SELECT* FROM `users` ";
   $requete=$db->query($sql);
   $users=$requete->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>table</title>
</head>

<body>
    <table border="3">
        <caption>fiche de recueillement</caption>
        <thead>
            <tr>
                <th>id</th>
                <!-- <th>id</th> -->
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
                <td><a href="edit.php"<?php echo $user['id'];?> >Editer</a></td>
                <td><a href="">Supprimer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>