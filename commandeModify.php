<?php 
include "./main.php";
include "./includes/header.php";
$query="select id from client";
$pdostmt=$pdo->prepare($query);
//$pdostmt->bindParam()
$pdostmt->execute();

$query1="select idArticle from article";
$pdostmt1=$pdo->prepare($query1);
$pdostmt1->execute();


$commandeId = isset($_GET['idCommande']) ? $_GET['idCommande'] : die('Error: Invalid ID.');
$sql = "SELECT * FROM commande WHERE idCommande = :idCommande";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idCommande', $commandeId);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)):
?>
<body>
<div class="container" style="padding:70px 10px 0">
    <h2>Modifier commande</h2>  
        <form method="post" action="process_edit_commande.php" class="row g-3">
            <input type="hidden" name="idCommande" value="<?php echo $row["idCommande"]; ?>">
            <div class="col-md-6">
            <label for="idClient" class="form-label">IdClient:</label><br>                
                <select name="idClient" class="form-control" required> 
                <?php
                                        
                        foreach($pdostmt->fetchAll(PDO::FETCH_NUM) as $tab){
                        foreach($tab as $elemt){
                            if ($row["id"]==$elemt) {
                                $selected="selected";
                            } else {
                                $selected="";
                            }
                            
                            echo "<option value=".$elemt." ".$selected.">" .$elemt."</option>";
                        }
                    }         
                ?> 
                
                <option><?php echo $row['idClient']; ?></option> 
                </select>        
            </div> 
            <div class="col-md-6">
            <label for="dateCommande">Date Commande:</label>
            <input type="text" class="form-control" name="dateCommande" id="dateCommande" value="<?php echo $row['dateCommande']; ?>"  required>
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
              <input type="text" class="form-control" name="quantite" value="<?php echo $elemt1 ?>" required>
            </div> 
           
           
            <br/>
            <button type="submit" class="btn btn-primary col-2">Modifier</button>
      
</form>
</div>
</body>
<?php 
endwhile;
include "./includes/footer.php";?>