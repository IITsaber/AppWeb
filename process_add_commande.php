
<?php
include_once './config/config.php';


if (!empty($_POST["quantite"]) && !empty($_POST['date'])) {
   
    $idclient= $_POST['idClient'];
    $date= $_POST['date'];
    $query="INSERT INTO commande(idClient, dateCommande) VALUES (:idClient,:dateCommande)";
    $req = $pdo->prepare($query);
    $req->bindParam(':idClient', $idclient);
    $req->bindParam(':dateCommande', $date);
    $req->execute();
    header("location:commandes.php");
 



   $idcmd=$pdo->lastInsertId();
    $idArticle= $_POST['idArticle'];
    $quantite= $_POST['quantite'];
    $query1="INSERT INTO ligne_commande(idCommande,idArticle, quantite) VALUES (:idCommande,:idArticle,:quantite)";
    $req1 = $pdo->prepare($query1);
    $req1->bindParam(':idCommande', $idcmd);
    $req1->bindParam(':idArticle', $idArticle);
    $req1->bindParam(':quantite', $quantite);
    $req1->execute();
    header("location:commandes.php");
    $req1->closeCursor();


}



?>

