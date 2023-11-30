
<?php
require './config/config.php';
if(!empty($_POST['description'])&&!empty($_POST['prix_unitaire'])){
try {
    

    $sql = "INSERT INTO article(description, prix_unitaire) VALUES (:description, :prix_unitaire)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':prix_unitaire', $prix);
    
    $description = $_POST['description'];
    $prix = $_POST['prix_unitaire'];   
    $stmt->execute();
header("location:articles.php");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
?>
