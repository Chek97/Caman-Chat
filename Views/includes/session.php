<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('location: ../main/main.php');
    }else{
        if(isset($_SESSION['errors']) && isset($_SESSION['message'])){
            echo("<div class='alert alert-" . $_SESSION['status'] ." alert-dismissible fade show' role='alert'>
                    <p>" . $_SESSION['message'] . "</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>"
                );
        }else if(isset($_SESSION['status']) && isset($_SESSION['message'])){
            echo("<div class='alert alert-" . $_SESSION['status'] ." alert-dismissible fade show' role='alert'>
                    <p>" . $_SESSION['message'] . "</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>"
            );
        }
        session_destroy();
    } 
?>