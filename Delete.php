<?php
require './config/config.php'; // Incluez vos paramètres de connexion à la base de données

if (!empty($_GET['id'])) {
    //$idclient=$_GET["id"];   
    $query="DELETE FROM client where id=:id ";
    $res=$pdo->prepare($query);
    $res->execute(["id"=>$_GET["id"]]);
    header("location:clients.php");
    $res->closeCursor();       
}
if (!empty($_GET['idArticle'])) {
    //$idclient=$_GET["id"];   
    $query="DELETE FROM article WHERE idArticle=:idArticle ";
    $res=$pdo->prepare($query);
    $res->execute(["idArticle"=>$_GET["idArticle"]]);
    header("location:articles.php");
    $res->closeCursor();  
}
if (!empty($_GET['idCommande'])) {
    //$idclient=$_GET["id"];   
    $query="DELETE FROM commande WHERE idCommande=:idCommande ";
    $res=$pdo->prepare($query);
    $res->execute(["idCommande"=>$_GET["idCommande"]]);
    header("location:commandes.php");
    $res->closeCursor();  
}
?>
