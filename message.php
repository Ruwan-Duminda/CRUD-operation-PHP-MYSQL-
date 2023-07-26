<?php
if(isset($_SESSION['message'])):
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <p><?=$_SESSION['message'];?></p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  </button>
</div>
<?php
unset($_SESSION['message']);
endif;
?>