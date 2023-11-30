<?php
include_once './config/config.php';
include_once "main.php";
if (!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['email'])&&!empty($_POST['ville'])) { 

        try {
            

            $sql = "INSERT INTO client(nom, prenom, email, ville) VALUES (:nom, :prenom, :email, :ville)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ville', $ville);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $ville = $_POST['ville'];
            $stmt->execute();
            header("location:clients.php");
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
        }
}
?>
