<?php 
include ("./config/config.php");
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$ville = $_POST['ville'];

$sql = "UPDATE client SET nom = :nom,prenom = :prenom, email = :email,ville = :ville WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);

$stmt->execute();

header('Location: clients.php');
?>