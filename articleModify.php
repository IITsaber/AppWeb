<?php 
include "./main.php";
include "./includes/header.php";

$articleId = isset($_GET['idArticle']) ? $_GET['idArticle'] : die('Error: Invalid ID.');

$sql = "SELECT * FROM article WHERE idArticle = :idArticle";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idArticle', $articleId);
$stmt->execute();

$article = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<body>
<div class="container" style="padding:70px 10px 0">
    <h2>Modifier article</h2>  
        <form method="post" action="process_edit_article.php">
            <input type="hidden" name="idArticle" value="<?php echo $articleId; ?>">
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php echo $article['description']; ?>" required>
            </div>
            <div class="form-group">
            <label for="prix_unitaire">Prix unitaire :</label>
            <input type="text" class="form-control" name="prix_unitaire" id="prix_unitaire" value="<?php echo $article['prix_unitaire']; ?>"  required>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    
</div>
</body>




<?php include "./includes/footer.php";?>