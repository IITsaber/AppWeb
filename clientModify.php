<?php
include "./includes/header.php";
include "./main.php";

$clientId = isset($_GET['id']) ? $_GET['id'] : die('Error: Invalid ID.');

$sql = "SELECT * FROM client WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $clientId);
$stmt->execute();

$client = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<h2>Modifier Client</h2>

<form action="process_edit_client.php" method="post">
    
    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
    <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="votre nom" value="<?php echo $client['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom"id="prenom" placeholder="votre prénom" value="<?php echo $client['prenom']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo $client['email']; ?>" >
        </div> 
        <div class="form-group">
            <label for="prenom">Ville:</label>
            <input type="text" class="form-control" name="ville" id="ville" placeholder="votre ville" value="<?php echo $client['ville']; ?>">
        </div>
        
        <br/>
            


        <input type="submit" value="Modifier" class="btn  btn-primary">
    
</form>
<?php include "./includes/footer.php";?>