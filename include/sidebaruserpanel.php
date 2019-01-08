<div class="user-panel">
  <div class="pull-left image">
    <?php
    // $sqlquery ="select * from user WHERE username = '$username' AND password = '$password'";
    // $result = mysqli_query($koneksi, $sqlquery);
    // $row = mysqli_fetch_assoc($result);?>
    <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image"/>
  </div>
  <div class="pull-left info">
    <p><?php echo $_SESSION['username'] ?></p>
    <!-- Status -->
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>
