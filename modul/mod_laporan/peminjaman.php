<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Laporan Peminjaman
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=laporan"><i class="fa fa-book"></i> Data Laporan Peminjaman</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
	  <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <center> <h3 class="box-title">Laporan Peminjaman</h3> </center>
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
				  <th>No.</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
									<th>Denda</th>
                </tr>
                </thead>
                <tbody>

						<?php
						$no = 1;
						$sqlquery = "SELECT m.*, b.*, p.* FROM peminjaman p INNER JOIN mahasiswa m ON p.npm = m.npm INNER JOIN buku b ON b.kode_buku =  p.kode_buku";
						if ($result = mysqli_query($koneksi, $sqlquery)) {
						    while ($row = mysqli_fetch_assoc($result)) {
									// $denda = 1000;
									 $keterlambatan = $today - $row["tanggal_kembali"];

									 $s1 = str_replace('-', '', $today); // Hilangkan karakter yang telah disebutkan di array $d
									 $s2 = str_replace('-', '', $row["tanggal_kembali"]);
									 $selisih = $s1 - $s2;

									//  $keterlambatan = abs(strtotime($today) - strtotime($row["tanggal_kembali"]));
									//  $tahun = floor($keterlambatan / (365*60*60*24));
									//  $bulan = floor(($keterlambatan - $tahun * 365*60*60*24) / (30*60*60*24));
									//  $hari = floor(($keterlambatan - $tahun * 365*60*60*24 - $bulan * 30*60*60*24) / (60*60*24));

									// $pecah1 = explode("-", $row["tanggal_kembali"]);
									// $date1 = $pecah1[0];
									// $month1 = $pecah1[1];
									// $year1 = $pecah1[2];
									//
									// $pecah2 = explode("-", $today);
									// $date2 = $pecah2[0];
									// $month2 = $pecah2[1];
									// $year2 = $pecah2[2];
									//
									// $jd1 = GregorianToJD($month1, $date1, $year1);
									// $jd2 = GregorianToJD($month2, $date2, $year2);
									//
									// $selisih = $jd2 - $jd;
									// $beda = floor($selisih);

									if ($today <= $row["tanggal_kembali"]) {
										$kena_denda = 0;
									}
									else {
										$kena_denda =  $selisih * 1000;
									}
							   ?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row["npm"];?></td>
                  <td><?php echo $row["nama_mahasiswa"];?></td>
                  <td><?php echo $row["judul"];?></td>
                  <td><?php echo $row["tanggal_pinjam"];?></td>
                  <td><?php echo $row["tanggal_kembali"];?></td>
									<td><?php echo rupiah($kena_denda);?></td>
                </tr>
    <?php
		$no++;
	}
    /* free result set */
    mysqli_free_result($result);
}
/* close connection */
mysqli_close($koneksi);
?>
        </tbody>
              </table>
							<div class='pull-right'>
							Pekanbaru, <?php echo tgl_indo($today); ?><br>
							<b><center>Kepala Perpustakaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Didik Sazali</center></b>
							</div>
            </div>
					</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
