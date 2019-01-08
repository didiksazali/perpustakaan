<?php if ($_SESSION['level']=='admin'){
?>
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <!-- Optionally, you can add icons to the links -->
  <li><a href="index.php?page=home"><i class="fa fa-home"></i> <span>Home</span></a></li>
  <li><a href="index.php?page=buku"><i class="fa fa-book"></i> <span>Buku</span></a></li>
  <li><a href="index.php?page=mahasiswa"><i class="fa fa-users"></i> <span>Mahasiswa</span></a></li>
  <li><a href="index.php?page=peminjaman"><i class="fa fa-calendar-check-o "></i> <span>Peminjaman</span></a></li>
  <li><a href="index.php?page=laporan"><i class="fa fa-calendar-check-o "></i> <span>Laporan Peminjaman</span></a></li>
  <li><a href="index.php?page=user"><i class="fa fa-user"></i> <span>User</span></a></li>
</ul>
<?php

}
elseif ($_SESSION['level']=='user') {
  ?>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="index.php?page=home"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li><a href="index.php?page=peminjaman"><i class="fa fa-calendar-check-o "></i> <span>Peminjaman</span></a></li>
    <li><a href="index.php?page=laporan"><i class="fa fa-calendar-check-o "></i> <span>Laporan Peminjaman</span></a></li>
    <li><a href="index.php?page=profile"><i class="fa fa-user"></i> <span>Profil</span></a></li>
  </ul>
<?php
 }
?>
