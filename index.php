<?php
$index=true;
include "./includes/header.php";
include "./main.php";

$query=" select c.nom,c.prenom,c.email,c.ville,cmd.dateCommande,art.description,art.prix_unitaire, 
lc.quantite from client as c, commande as cmd, article as art, ligne_de_commande as lc 
where c.id=cmd.idClient and cmd.idCommande=lc.idCommande and art.idArticle=lc.idArticle;";
$objstmt=$pdo->prepare($query);
$objstmt->execute();
//var_dump($objstmt->fetchAll(PDO::FETCH_ASSOC));


?>


    <h1 class="mt-5">Accueil</h1>
    <table id="myTable" class="display">
            <thead>
                <tr>
                    <th></th>
                    <th>Nom et Prénom</th>                    
                    <th>Email</th>
                    <th>Ville</th>
                    <th>date</th>
                    <th>Description</th>
                    <th>prix_unitaire</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row=$objstmt->fetch(PDO::FETCH_ASSOC)):
                ?>
                <tr>
                    <td>
                        <a href="details.php?idCommande=<?php //echo $row["idCommande"]; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </a>
                    </td>
                    <td><?php echo $row["nom"] . " " . $row["prenom"]; ?></td>                    
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["ville"]; ?></td>
                    <td><?php echo $row["dateCommande"];?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["prix_unitaire"]; ?></td>
                    <td><?php echo $row["quantite"]; ?></td>
                    
                </tr>
               <?php endwhile;?>
            </tbody>
        </table>
    
  </div>
</main>

<?php
$objstmt->closeCursor(); 
include "./includes/footer.php";
?>