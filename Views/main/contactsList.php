<aside class="main-aside">
    <header class="main-aside--header">
        <h2>CONTACTOS</h2>
    </header>
    <div class="main-aside--content">
    <?php 
        require_once('../../Controllers/Contacts/ContactsController.php');
        $listContacts = $insController->getListOfContacts($_SESSION['user']['id']);
        if(count($listContacts) > 0){
    ?>
        <ul class="list-group contact-list">
            <?php 
                foreach ($listContacts as $contact){        
            ?>
            <li class="list-group-item list-group-item-primary">
                <div class="contact-list-item__img">
                    <img src="../../Public/img/profile-user.png" alt="imagen">
                </div>
                <div class="contact-list-item__name">
                    <p><?php echo($contact['name'] . ' ' . $contact['last_name']); ?></p>
                </div>
                <div class="contact-list-item__chat">
                    <div class="contact-list-item__options">
                        <a href="../contacts/editContact.php?id=<?php echo($contact['id']); ?>"><i class="far fa-edit"></i></a>
                        <a href="../../Controllers/Contacts/ContactsController.php?a=delete&id=<?php echo($contact['id']); ?>"><i class="far fa-trash-alt"></i></a>
                    </div>
                    <a 
                        class="contact-list-item__message" 
                        href="../conversations/chatRoom.php?id=<?php echo($_SESSION['user']['id']); ?>&contactId=<?php echo($contact['user_contact_id']); ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </li>
            <?php 
                }
            ?>
        </ul>
    <?php 
        }else{
    ?>
        <div class="main-aside__contacts-message__not">
            <p>No hay contactos agregados</p>
        </div>
    <?php 
        }
    ?>
    </div>
    <div>
        <div class="p-2 text-center">
            <a href="../contacts/addContact.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Contacto</button></a>
        </div>
    </div>
</aside>