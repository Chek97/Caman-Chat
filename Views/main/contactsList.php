<?php 
    require_once('../../Controllers/Contacts/ContactsController.php');
    $listContacts = $insController->getListOfContacts($_SESSION['user']['id']);
    if(count($listContacts) > 0){
?>
    <ul>
        <?php 
            foreach ($listContacts as $contact){        
        ?>
        <li><?php print_r($contact); ?></li>
        <?php 
            }
        ?>
    </ul>
<?php 
    }else{
?>
    <div class="main-aside__contacts-message__not">
        <p>No hay contactos agregados</p>
        <a href="../contacts/addContact.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
    </div>
<?php 
    }
?>