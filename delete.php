<?php

require_once "connexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id`=?";
    $requete = $db->prepare($sql);
    $requete->execute([$id]);
    header("location:table.php");
}
