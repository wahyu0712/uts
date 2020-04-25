<?php
include "config.php";
include "header.php";
?>

<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a> &nbsp; &nbsp;
 <br/>
</p>
<table id="ghatable" class="display table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>No.</th>
          <th>Wilayah</th>
          <th>Positif</th>
          <th>Dirawat</th>
          <th>Sembuh</th>
          <th>Meninggal</th>
          <th>Perawat</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM tbl_covid19 order by id");
$no = 1;
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?= $no ?></td>
          <td><?= $row['wilayah'] ?></td>
          <td><?= $row['positif'] ?></td>
          <td><?= $row['dirawat'] ?></td>
          <td><?= $row['sembuh'] ?></td>
          <td><?= $row['meninggal'] ?></td>
          <td><?= $row['perawat'] ?></td>
     </tr>

<?php
$no++;
endwhile;
?>

</tbody>
</table>

<?php
include "footer.php";
?>
