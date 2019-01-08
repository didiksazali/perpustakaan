<?php
session_start();
if ($_SESSION['blokir']=='n') {

?>
<section class="content-header">
      <h1>
        Home
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="callout callout-info">
            <h4>Selamat Datang <?php echo $_SESSION['username'] ?></h4>
            <p>Selamat bertugas, semoga hari anda menyenangkan ^_^</p>
          </div>

					<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
    							<?php
    							$sqlquery = "SELECT COUNT(kode_buku) as total FROM peminjaman";
    							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
    							$row = mysqli_fetch_assoc($result);
    							$jumlah_pemijaman= $row['total'];
    							?>
                  <h3><?php echo $jumlah_pemijaman;?></h3>
                  <p>Peminjaman</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar-check-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                </a>
              </div>
            </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
							<?php
							$sqlquery = "SELECT COUNT(kode_buku) as total FROM buku";
							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
							$row = mysqli_fetch_assoc($result);
							$jumlah_buku= $row['total'];
							?>
              <h3><?php echo $jumlah_buku;?></h3>
              <p>Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
							<?php
							$sqlquery = "SELECT COUNT(npm) as total FROM mahasiswa";
							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
							$row = mysqli_fetch_assoc($result);
							$jumlah_mahasiswa= $row['total'];
							?>
              <h3><?php echo $jumlah_mahasiswa; ?></h3>
              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
							<?php
							$sqlquery = "SELECT COUNT(id) as total FROM user";
							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
							$row = mysqli_fetch_assoc($result);
							$jumlah_admin= $row['total'];
							?>
              <h3><?php echo $jumlah_admin; ?></h3>
              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>

<?php
} else {?>
  <section class="content-header">
        <h1>
          Home
          <!--<small>Optional description</small>-->
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content container-fluid">
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
          <div class="callout callout-danger">
              <h4>Mohon maaf <?php echo $_SESSION['username'] ?></h4>
              <p>Akun anda diblokir, harap hubungi Admin</p>
            </div>
  					<div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
                <p>Kegiatan</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper-o"></i>
              </div>
              <a href="#" class="small-box-footer">
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
  							<?php
  							$sqlquery = "SELECT COUNT(kode_divisi) as total FROM divisi";
  							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  							$row = mysqli_fetch_assoc($result);
  							$jumlah_divisi= $row['total'];
  							?>
                <h3><?php echo $jumlah_divisi;?></h3>
                <p>Divisi</p>
              </div>
              <div class="icon">
                <i class="fa fa-sitemap"></i>
              </div>
              <a href="#" class="small-box-footer">
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
  							<?php
  							$sqlquery = "SELECT COUNT(nik) as total FROM pengurus";
  							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  							$row = mysqli_fetch_assoc($result);
  							$jumlah_pengurus= $row['total'];
  							?>
                <h3><?php echo $jumlah_pengurus; ?></h3>
                <p>Pengurus</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
  							<?php
  							$sqlquery = "SELECT COUNT(id) as total FROM user";
  							$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  							$row = mysqli_fetch_assoc($result);
  							$jumlah_admin= $row['total'];
  							?>
                <h3><?php echo $jumlah_admin; ?></h3>
                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </section>
<?php
}
?>
