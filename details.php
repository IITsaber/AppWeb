<?php 
include "./main.php";
include "./includes/header.php";
$query="select id from client";
$pdostmt=$pdo->prepare($query);
$pdostmt->execute();

$query1="select idArticle from article";
$pdostmt1=$pdo->prepare($query1);
$pdostmt1->execute();

if($_POST){header("location:index.php");}
    $idCommande=$_GET["idCommande"];
    $query="select * from commande,ligne_de_commande,client 
     where  commande.idCommande=ligne_de_commande.idCommande
     and commande.idClient=client.id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute();
    $res=$objstmt->fetch(PDO::FETCH_ASSOC);
    $query_views="update commande set vues=:views where idCommande=:idCommande";
    $objstmt_views=$pdo->prepare($query_views);
    $objstmt_views->execute(["idCommande"=>$res["idCommande"],"views"=>$res["vues"]+1]);

    $query_views_select="select * from commande  where idCommande=:idCommande";
    $objstmt_views_select=$pdo->prepare($query_views_select);
    $objstmt_views_select->execute(["idCommande"=>$res["idCommande"]]);
    $row_selected=$objstmt_views_select->fetch(PDO::FETCH_ASSOC);
?>
<body>
<div class="container" style="padding:70px 10px 0">
                            <div style="float: right;color:blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                            <?php echo $row_selected["vues"];?>
                            </div>
    <h2>détails commande</h2>  
        <form method="POST"  class="row g-3">
            
            <div class="col-md-6">
            <label for="idClient" class="form-label">IdClient:</label><br>                
                <select name="idClient" class="form-control" disabled> 
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
                </select>        
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Nom:</label><br>
              <input type="text" class="form-control" name="quantite" value="<?php echo $res["nom"] ?>" disabled>
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Quantité:</label><br>
              <input type="text" class="form-control" name="quantite" value="<?php echo $res["prenom"] ?>" disabled>
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Quantité:</label><br>
              <input type="text" class="form-control" name="quantite" value="<?php echo $res["email"] ?>" disabled>
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Quantité:</label><br>
              <input type="text" class="form-control" name="quantite" value="<?php echo $res["ville"] ?>" disabled>
            </div> 
            <div class="col-md-6">
            <label for="dateCommande">Date Commande:</label>
            <input type="text" class="form-control" name="dateCommande" id="dateCommande" value="<?php echo $res['dateCommande']; ?>"  disabled>
            </div>
            <div class="col-md-6">
                <label for="idArticle" class="form-label">Article:</label><br>
                <select name="idArticle" class="form-control" disabled>
                    <?php                    
                    foreach($pdostmt1->fetchAll(PDO::FETCH_NUM) as $tab1){
                        foreach($tab1 as $elemt1){echo "<option value=".$elemt1.">" .$elemt1."</option>";}
                    }
                    ?>                    
                </select>
            </div> 
            <div class="col-md-6">
                <label for="quantite" class="form-label">Quantité:</label><br>
              <input type="text" class="form-control" name="quantite" value="<?php echo $res["quantite"] ?>" disabled>
            </div> 
           
           
            <br/>
            <a href="index.php" type="submit" class="btn btn-primary col-2">Fermer</a>
      
</form>
</div>
</body>
<?php include "./includes/footer.php";?>