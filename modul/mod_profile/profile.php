<?php
if ($_SESSION['level']=='user') {
  if ($_SESSION['blokir']=='n') {

$aksi = "modul/mod_profile/aksi_profile.php";
switch($_GET['act']){
	default:
	?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=profile"><i class="fa fa-user"></i> Profile</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Profile Data Page</h3>
          <!-- <a href='tambahpengurus.php'><img class="tambahdata" src="images/add.png" align="right" ></a> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-10">
                <!-- <a href='addpengurus.php'><img class="tambahdata" src="images/add.png" align="right" ></a> -->
                </div>
          <div class="col-sm-2">
            <!-- <button type="button" class="btn btn-block btn-success btn-sm">Detail</button> -->
          </div>
            </div>

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>Password</th>
              <th>Email</th>
              <th>Level</th>
              <th>Foto</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

    <?php
            $id=$_SESSION['id'];
            $sqlquery = "SELECT id, nama_lengkap, username, password, email, level, foto FROM user WHERE id=$id";

if ($result = mysqli_query($koneksi, $sqlquery)) {
while ($row = mysqli_fetch_assoc($result)) {
 ?>
<tr>
              <td><?php echo $row["nama_lengkap"];?></td>
              <td><?php echo $row["username"];?></td>
              <td><?php echo $row["password"];?></td>
              <td><?php echo $row["email"];?></td>
              <td><?php echo $row["level"];?></td>
              <td> <img src="images/users/<?php echo $row['foto']; ?>" width="80px" name="foto" id="foto"/></td>
       <td><a href='?page=profile&act=update&id=<?php echo $row['id'];?>'>
         <button type="button" class="btn btn-block btn-success btn-sm"><span class="glyphicon glyphicon-wrench"></span></button></a>
      </td>
    </tr>
<?php
}
/* free result set */
mysqli_free_result($result);
}
/* close connection */
mysqli_close($koneksi);
?>
            </tbody>
          </table>
        </div>
      </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->

		<?php
		break;
		// form edit profile
		case "update":
		$id = $_GET['id'];
		$sqlquery = "SELECT id, nama_lengkap, username, password, email, foto, blokir FROM user where id='$id'";
		$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
		$row = mysqli_fetch_assoc($result);
		?>

		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Edit Profile
				<!--<small>Optional description</small>-->
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php?page=profile&act=update&id=<?php echo $id;?>"><i class="fa fa-user"></i> Edit Profile</a></li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content container-fluid">
				<!-- Horizontal Form -->
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">Edit Profile Form</h3>
								</div>
								<!-- /.box-header -->
								<!-- form start -->
								<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=profile&act=update">
									<div class="box-body">

										<input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">

										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row["nama_lengkap"]; ?>" id="nama_lengkap" placeholder="">
											</div>
										</div>

									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="username" value="<?php echo $row["username"]; ?>" id="username" placeholder="">
											</div>
										</div>

										<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
												<div class="col-sm-10">
													<input type="password" class="form-control" name="password" value="" id="password" placeholder="">
												</div>
											</div>

											<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="email" value="<?php echo $row["email"]; ?>" id="email" placeholder="">
													</div>
												</div>

												<div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
														<div class="col-sm-10">
															<img src="images/users/<?php echo $row['foto']; ?>" width="120px" name="foto" id="foto"/>
															<input type="file" name="foto" value="<?php echo $row["foto"]; ?>" id="foto">
														</div>
													</div>

													<div class="form-group">
															<label for="inputEmail3" class="col-sm-2 control-label">Blokir</label>
															<div class="col-sm-10">
															<div class="radio">
																<label>
																	<input type="radio" name="blokir" id="blokir" value="y" <?php if ($row["blokir"]=="y") { echo "checked";} ?> >
																	Ya
																</label>
											<label>
												<input type="radio" name="blokir" id="blokir" value="n" <?php if ($row["blokir"]=="n") { echo "checked";} ?> >
																	Tidak
																</label>
															</div>
													</div>
														</div>
									</div>
						<!-- /.box-body -->
									<div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" name="simpan" onClick="return validasi()"><span class="glyphicon glyphicon-floppy-save"></span></button>
                    <button class="btn btn-danger pull-right" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span></button>
									</div>
						</form>
		</section>
		<!-- /.content -->

		<?php
			break;
		}
	} else {
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

	          <div class="callout callout-danger">
	              <h4>Mohon maaf <?php echo $_SESSION['username'] ?></h4>
	              <p>Akun anda diblokir, harap hubingi Admin</p>
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
}
		?>
