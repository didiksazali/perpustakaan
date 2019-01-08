<script language="javascript">
	function validasi(form){
		if (form.nama_lengkap.value == ""){
			alert("Anda belum mengisikan nama lengkap.");
			form.nama_lengkap.focus();
			return (false);
		}

		if (form.username.value == ""){
			alert("Anda belum mengisikan username.");
			form.username.focus();
			return (false);
		}
		if (form.password.value == ""){
			alert("Anda belum mengisikan password.");
			form.password.focus();
			return (false);
		}
		if (form.email.value == ""){
			alert("Anda belum mengisikan email.");
			form.email.focus();
			return (false);
		}
		if (form.level.value == ""){
			alert("Anda belum mengisikan level.");
			form.level.focus();
			return (false);
		}
		if (form.foto.value == ""){
			alert("Anda belum menambahkan foto.");
			form.foto.focus();
			return (false);
		}
		if (form.blokir.value == ""){
			alert("Anda belum mengisikan blokir.");
			form.blokir.focus();
			return (false);
		}
	}
</script>

<?php
$aksi = "modul/mod_user/aksi_user.php";
switch($_GET['act']){
	default:
	?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Data
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=user"><i class="fa fa-user"></i> User Data</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
	  <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Data Page</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-10">
										</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-info pull-right" onclick="window.location.href='?page=user&act=input'"><span class="fa fa-user-plus"></span></button>
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
									<th>Blokir</th>
				  				<th>Action</th>
                </tr>
                </thead>
                <tbody>

<?php
$sqlquery = "SELECT id, nama_lengkap, username, password, email, level, foto, blokir FROM user";

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
									<td><?php if($row["level"]=='admin'){ echo "never";} else {
										echo $row["blokir"];
									}?></td>
				   <td>
						 <?php if($row["level"]=='admin'){?>
							 <a href='?page=user&act=update&id=<?php echo $row['id'];?>'>
							 	<button type="button" class="btn btn-block btn-success btn-sm"><span class="glyphicon glyphicon-wrench"></span></button></a>
							<?php } else { ?>
								<a href='?page=user&act=update&id=<?php echo $row['id'];?>'>
 							 	<button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-wrench"></span></button></a>
								<a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='<?php echo $aksi;?>?page=user&act=delete&id=<?php echo $row['id'];?>'>
									<button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a>
						 <?php }?>
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
  // form tambah user
  case "input":
  ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=user&act=input"><i class="fa fa-user"></i> Add User</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=user&act=input" onSubmit="return validasi(this)">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="">
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" id="password" placeholder="">
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="">
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10">
                            <div class="radio">
                              <label>
                                <input type="radio" name="level" id="level" value="admin" >
                                Admin
                              </label>
                    <label>
                      <input type="radio" name="level" id="level" value="user" checked >
                                User
                              </label>
                            </div>
                        </div>
                          </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-10">
                              <input type="file" name="foto" id="foto">
                            </div>
                          </div>

													<div class="form-group">
		                          <label for="inputEmail3" class="col-sm-2 control-label">Blokir</label>
		                          <div class="col-sm-10">
		                          <div class="radio">
		                            <label>
		                              <input type="radio" name="blokir" id="blokir" value="y" >
		                              Ya
		                            </label>
		        					<label>
		                    <input type="radio" name="blokir" id="blokir" value="n" checked >
		                              Tidak
		                            </label>
		                          </div>
		                      </div>
		                        </div>
                  </div>
    			  <!-- /.box-body -->
                  <div class="box-footer">
    			  			<button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-save"></span></button>
                  <button class="btn btn-danger pull-right" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span></button>
                  </div>
    			  </form>
    </section>
    <!-- /.content -->

    <?php
    break;
    // form edit user
    case "update":
    $id = $_GET['id'];
    $sqlquery = "SELECT level, id, nama_lengkap, username, password, email, foto, blokir FROM user where id='$id'";
    $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
    $row = mysqli_fetch_assoc($result);
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=user&act=update&id=<?php echo $id;?>"><i class="fa fa-user"></i> Edit User</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=user&act=update">
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

													<?php
													if ($row['level']=='admin') {?>
														<input type="hidden" name="blokir" id="blokir" value="<?php echo $row["blokir"];?>" >
													<?php } else {
														?>
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
												<?php
													}
													 ?>

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
    ?>
