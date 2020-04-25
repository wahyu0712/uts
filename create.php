<?php
include "config.php";
include "header.php";
?>
<a href="index.php" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
<?php
if(isset($_POST['bts'])):
  if($_POST['wl']!=null && $_POST['ps']!=null && $_POST['dr']!=null  && $_POST['sm']!=null && $_POST['mn']!=null && $_POST['pr']!=null){
     $stmt = $mysqli->prepare("INSERT INTO tbl_covid19 (wilayah,positif,dirawat,sembuh,meninggal,perawat) VALUES ( ?,?,?,?,?,?)");
	 $stmt->bind_param('ssssss', $wl, $ps, $dr, $sm,$mn,$pr);
	
     $wl = $_POST['wl'];
     $ps = $_POST['ps'];
     $dr = $_POST['dr'];
     $sm = $_POST['sm'];
     $mn = $_POST['mn'];
     $pr = $_POST['pr'];

     if($stmt->execute()):
?>
<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Berhasil!</strong> Silahkan tambah lagi , <a href="index.php" class="btn btn-primary btn-sm">Tutup</a> jika ingin keluar.
</div>
<?php
     else:
?>
<p></p>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Gagal!</strong> Gagal total, Silahkan coba lagi!!!.<?php echo $stmt->error; ?>
</div>
<?php
     endif;
  } else{
?>
<p></p>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Gagal!</strong> Form tidak boleh kosong, tolong diisi.
</div>
<?php
  }
endif;
?>
	    <p><br/></p>
	    <div class="panel panel-default">
	      <div class="panel-body">

		<form role="form" method="post">
		<div class="form-group">
		    <label for="wl">Wilayah</label>
		    <select class="form-control" id="wl" name="wl">
		      <option>DKI Jakarta</option>
		      <option>Jawa Barat</option>
		      <option>Banten</option>
		      <option>Jawa Tengah</option>
		      <option>Jawa Timur</option>
		    </select>
		  </div>	
		  <div class="form-group">
		    <label for="ps">Jumlah Positif</label>
		    <input type="text" class="form-control" name="ps" id="ps" placeholder="Masukan Jumlah Positif">
		  </div>

		  <div class="form-group">
		    <label for="dr">Jumlah Dirawat</label>
		    <input type="text" class="form-control" name="dr" id="dr" placeholder="Masukan Jumlah Dirawat">
		  </div>
		  <div class="form-group">
		    <label for="sm">Jumlah Sembuh</label>
		    <input type="text" class="form-control" name="sm" id="sm" placeholder="Masukan Jumlah Sembuh">
		  </div>
		  <div class="form-group">
		    <label for="mn">Jumlah Meninggal</label>
		    <input type="text" class="form-control" name="mn" id="mn" placeholder="Masukan Jumlah Meninggal">
		  </div>
		  <div class="form-group">
		    <label for="pr">Perawat</label>
		    <input type="text" class="form-control" name="pr" id="pr" placeholder="Masukan Nama Perawat">
		  </div>
		  <button type="submit" name="bts" class="btn btn-success btn-md">Simpan</button>
		</form>
<?php
include "footer.php";
?>
