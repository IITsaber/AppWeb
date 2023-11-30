<?php include "./includes/header.php";?>

<body>
<div class="container" style="padding:70px 10px 0">
    <h2 class="mt-5">Ajouter Article</h2>
    <form method="post" action="process_add_article.php">
            
            <div class="form-group">
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" class="col-8"></textarea>
            </div>
            <div class="form-group col-8">
                <label for="pu">Prix_Unitaire:</label><br>
                <input type="text" class="form-control" name="prix_unitaire" id="prix_unitaire" required class="col-12">
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
</div>
</body>



<?php include "./includes/footer.php";?>