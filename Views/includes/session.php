<?php
    if(isset($_SESSION['errors']) && isset($_SESSION['message'])){
?>
    <div class="alert alert-<?php echo($_SESSION['status']); ?> alert-dismissible fade show" role="alert">
        <p><?php echo($_SESSION['message']); ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php    
    }else if(isset($_SESSION['status']) && isset($_SESSION['message'])){
?>
    <div class="alert alert-<?php echo($_SESSION['status']); ?> alert-dismissible fade show" role="alert">
        <p><?php echo($_SESSION['message']); ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    }
?>