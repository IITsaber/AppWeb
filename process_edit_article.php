<?php
include ("./config/config.php");
$id = $_POST['idArticle'];
$description = $_POST['description'];
$prix = $_POST['prix_unitaire'];

$sql = "UPDATE article SET description= :description,prix_unitaire = :prix_unitaire WHERE idArticle = :idArticle";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idArticle', $id, PDO::PARAM_INT);
$stmt->bindParam(':description', $description, PDO::PARAM_STR);
$stmt->bindParam(':prix_unitaire', $prix, PDO::PARAM_STR);


$stmt->execute();

header('Location: articles.php');
?>
