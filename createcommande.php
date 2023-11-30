<?php 
$commande=true;
include_once "./includes/header.php";
include_once "main.php";
// query for customers
$query="select id from client";
$pdostmt=$pdo->prepare($query);
$pdostmt->execute();
// query for article
$query1="select idArticle from article";
$pdostmt1=$pdo->prepare($query1);
$pdostmt1->execute();
?>

<body>
    <h1 class="mt-5">Ajouter Commande</h1>
    <form method="post"class="row g-3"  action="process_add_commande.php">            
            <div class="col-md-6">
                <label for="idClient" class="form-label">IdClient:</label><br>
                <select name="idClient" class="form-control" required>
                    <?php                    
                    foreach($pdostmt->fetchAll(PDO::FETCH_NUM) as $tab){
                        foreach($tab as $elemt){echo "<option value=".$elemt.">" .$elemt."</option>";}
                    }
                    ?>                    
                </select>
            </div>             
            <div class="col-md-6">
                <label for="date" class="form-label">Date_Commande:</label><br>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>
            <div class="col-md-6">
                <label for="idArticle" class="form-label">Article:</label><br>
                <select name="idArticle" class="form-control" required>
                    <?php                    
                    foreach($pdostmt1->fetchAll(PDO::FETCH_NUM) as $tab1){
                        foreach($tab1 as $elemt1){echo "<option value=".$elemt1.">" .$elemt1."</option>";}
                    }
                    ?>                    
                </select>
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Quantité:</label><br>
              <input type="text" class="form-control" name="quantite">
            </div> 
            <br>
            <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>

</body>



<?php 
//endwhile;
include "./includes/footer.php";?>