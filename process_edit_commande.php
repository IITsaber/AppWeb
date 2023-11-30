<?php 
include ("./config/config.php");
$idCommande=$_POST['idCommande'];
$idClient= $_POST['idClient'];
$dateCommande = $_POST['dateCommande'];


$sql = "UPDATE commande SET idClient=:idClient, dateCommande = :dateCommande WHERE idCommande = :idCommande";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idClient', $idClient, PDO::PARAM_INT);
$stmt->bindParam(':idCommande', $idCommande, pdo::PARAM_INT);
$stmt->bindParam(':dateCommande', $dateCommande, PDO::PARAM_STR);
$stmt->execute();

header('Location: commandes.php');
?>