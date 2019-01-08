<script language="javascript">
	function validasi(form){
		if (form.judul.value == ""){
			alert("Anda belum mengisikan judul buku.");
			form.judul.focus();
			return (false);
		}

		if (form.pengarang.value == ""){
			alert("Anda belum mengisikan pengarang buku.");
			form.pengarang.focus();
			return (false);
		}

    if (form.tahun.value == ""){
			alert("Anda belum mengisikan tahun buku.");
			form.tahun.focus();
			return (false);
		}

    if (form.penerbit.value == ""){
			alert("Anda belum mengisikan penerbit buku.");
			form.penerbit.focus();
			return (false);
		}
	}
</script>

<?php
$aksi = "modul/mod_buku/aksi_buku.php";
switch($_GET['act']){
	default:
	?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Buku
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=buku"><i class="fa fa-book"></i> Data Buku</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
	  <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Buku Page</h3>
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
								<button type="button" class="btn btn-info pull-right" onclick="window.location.href='?page=buku&act=input'"><span class="fa fa-plus"></button>
							</div>
								</div>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
									<th>No.</th>
									<th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Tahun</th>
                  <th>Penerbit</th>
				  			 	<th>Action</th>
                </tr>
                </thead>
                <tbody>

						<?php
						$no = 1;
						$p      = new PagingHalaman();
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);

						$sqlquery = "SELECT * FROM buku";
						if ($result = mysqli_query($koneksi, $sqlquery)) {
						    while ($row = mysqli_fetch_assoc($result)) {
							   ?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row["kode_buku"];?></td>
                  <td><?php echo $row["judul"];?></td>
                  <td><?php echo $row["pengarang"];?></td>
                  <td><?php echo $row["tahun"];?></td>
                  <td><?php echo $row["penerbit"];?></td>
				   <td><a href='?page=buku&act=update&id=<?php echo $row['id'];?>'><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-wrench"></span></button></a>
            <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='<?php echo $aksi;?>?page=buku&act=delete&id=<?php echo $row['id'];?>'><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>
    <?php
		$no++;
	}
			$jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM buku"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[num], $jmlhalaman);
    /* free result set */
    mysqli_free_result($result);
}
/* close connection */
mysqli_close($koneksi);
?>
        </tbody>
              </table>

							<div class="col-sm-12" align="right">
								<?php echo "<ul class='pagination'>$linkHalaman </ul>"; ?>
							</div>

            </div>
					</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->

	<?php
	break;
	case "input":
	?>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Buku
			<!--<small>Optional description</small>-->
		</h1>
		<ol class="breadcrumb">
			<li><a href="index.php?page=buku&act=input"><i class="fa fa-book"></i> Tambah Buku</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content container-fluid">
			<!-- Horizontal Form -->
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Tambah Buku Form</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=buku&act=input" onSubmit="return validasi(this)">
								<div class="box-body">

									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="">
											</div>
										</div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Pengarang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="">
                        </div>
                      </div>

								<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
										<div class="col-sm-10">
											<select class="form-control" name="tahun" id="tahun">
                      <option value="">Pilih Tahun</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      </select>
										</div>
									</div>

									<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="">
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
	case "update":
	$id = $_GET['id'];
  $sqlquery = "SELECT * FROM buku WHERE id='$id'";
	$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
	$row = mysqli_fetch_assoc($result);
	?>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Buku
			<!--<small>Optional description</small>-->
		</h1>
		<ol class="breadcrumb">
			<li><a href="index.php?page=buku&act=update&id=<?php echo $id;?>"><i class="fa fa-book"></i> Edit Buku</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content container-fluid">
			<!-- Horizontal Form -->
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Edit Buku Form</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=buku&act=update">
								<div class="box-body">

									<input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="kode_buku" value="<?php echo $row["kode_buku"]; ?>" id="kode_buku" placeholder="" readonly="true">
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="judul" value="<?php echo $row["judul"]; ?>" id="judul" placeholder="">
										</div>
									</div>

								<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">pengarang</label>
										<div class="col-sm-10">
                      <input type="text" class="form-control" name="pengarang" value="<?php echo $row["pengarang"]; ?>" id="pengarang" placeholder="">
										</div>
									</div>

                  <div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
										<div class="col-sm-10">
											<!-- <input type="text" class="form-control" name="tahun" value="<?php //echo $row["tahun"]; ?>" id="tahun" placeholder=""> -->
											<select class="form-control" name="tahun">
                      <option value="">Pilih Tahun</option>
                      <option value="2010" <?php if($row['tahun'] == '2010'){ echo 'selected'; } ?> >2010</option>
                      <option value="2011" <?php if($row['tahun'] == '2011'){ echo 'selected'; } ?> >2011</option>
                      <option value="2012" <?php if($row['tahun'] == '2012'){ echo 'selected'; } ?> >2012</option>
                      <option value="2013" <?php if($row['tahun'] == '2013'){ echo 'selected'; } ?> >2013</option>
                      <option value="2014" <?php if($row['tahun'] == '2014'){ echo 'selected'; } ?> >2014</option>
                      <option value="2015" <?php if($row['tahun'] == '2015'){ echo 'selected'; } ?> >2015</option>
                      <option value="2016" <?php if($row['tahun'] == '2016'){ echo 'selected'; } ?> >2016</option>
                      <option value="2017" <?php if($row['tahun'] == '2017'){ echo 'selected'; } ?>>2017</option>
                      <option value="2018" <?php if($row['tahun'] == '2018'){ echo 'selected'; } ?>>2018</option>
                      </select>
										</div>
									</div>

								<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
										<div class="col-sm-10">
                      <input type="text" class="form-control" name="penerbit" value="<?php echo $row["penerbit"]; ?>" id="penerbit" placeholder="">
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
?>
