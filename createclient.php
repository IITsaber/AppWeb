
<?php include "./includes/header.php";
include "./main.php";
?>



    <h1>Ajouter Client</h1>
    <form action="process_add_client.php" method="POST">
    
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="votre nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom"id="prenom" placeholder="votre prénom" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div> 
        <div class="form-group">
            <label for="prenom">Ville:</label>
            <input type="text" class="form-control" name="ville" id="ville" placeholder="votre ville" required>
        </div>
        
        <br/>
            


        <input type="submit" value="Ajouter" class="btn  btn-primary">
    </form>




<?php include "./includes/footer.php";?>
