<?php 

    require_once('../../Models/Contacts/Contacts.php');

    class ContactsController {

        private $contactModel;

        public function __construct(){
            $this->contactModel = new Contacts();
        }

        public function getListOfContacts($userId){

            $listOfContacts = $this->contactModel->getContacts($userId);
            return $listOfContacts;
        }
    }

    $insController = new ContactsController();



?>