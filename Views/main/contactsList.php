<?php 
    require_once('../../Controllers/Contacts/ContactsController.php');
    $listContacts = $insController->getListOfContacts($_SESSION['user']['id']);
    if(count($listContacts) > 0){
?>
    <ul class="list-group contact-list">
        <?php 
            foreach ($listContacts as $contact){        
        ?>
        <li class="list-group-item list-group-item-primary ">
            <div class="contact-list-item__img">
                <img class="img-thumbnail" src="../../Public/img/profile-user.png" alt="imagen">
            </div>
            <div>
                <p><?php echo($contact['name'] . ' ' . $contact['last_name']); ?></p>
            </div>
            <a href="#">Seguir</a>
        </li>
        <?php 
            }
        ?>
        <div class=" mt-3 text-center">
            <a href="../contacts/addContact.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
    </ul>
<?php 
    }else{
?>
    <div class="main-aside__contacts-message__not">
        <p>No hay contactos agregados</p>
        <div class=" mt-3 text-center">
            <a href="../contacts/addContact.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
    </div>
<?php 
    }
?>