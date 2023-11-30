<?php 
require_once "./includes/header.php";
require_once "./main.php";
$count=0;
$list=[];
$query="SELECT `id` FROM client WHERE id IN (SELECT idClient from commande where commande.idClient=client.id)";
$pdostmt=$pdo->prepare($query);
$pdostmt->execute();
foreach ($pdostmt->fetchAll(PDO::FETCH_ASSOC) as $tabvalues) {
    foreach ($tabvalues as $tabelements) {
        $list[]= $tabelements;       
    }
}


?>
<h1 class="mt-5">Liste des clients</h1>

    <a href="createclient.php" class="btn btn-primary" style="float: right;margin-bottom:20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
    </a>

<?php            
    $sql = "SELECT * FROM client";  
    $pdostmt=$pdo->prepare($sql);
    $pdostmt->execute();              
?>
    <table class="display" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
             $count++;
            ?>
            <tr>                                    
                <td><?php echo $row['id'];?> </td>
                <td><?php echo $row['nom']?> </td>
                <td><?php echo $row['prenom']?> </td>
                <td><?php echo $row['email']?> </td>
                <td><?php echo $row['ville']?> </td>
                <td>
                    <a href="clientModify.php?id=<?php echo $row['id'] ?>" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </a>
                    <button type="button" class="btn btn-danger" <?php if(in_array($row['id'],$list)){echo "disabled";} ?> data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $count;?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </button>
                </td>
            </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $count;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Voulez vous supprimé ce client ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="Delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Supprimer</a>
                        </div>
                        </div>
                    </div>
                    </div>

            <?php endwhile;?>
        </tbody>                            
    </table>

<?php require_once "./includes/footer.php";?>