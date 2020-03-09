<?php
//  jika  tombol  ubah  diklik 003:  if  (isset($_GET['nis']))  { 004:	//  ambil  data  get  dari  form 005:	$nis  =  $_GET['nis'];
	//  perintah  query  untuk  menampilkan  data  dari  tabel  siswa  berdasarkan nis 007:	$query  =  mysqli_query($db,  "SELECT  *  FROM  tbl_siswa  WHERE nis='$nis'")
or  die('Query  Error  :  '.mysqli_error($db)); 008:	$data  =  mysqli_fetch_assoc($query);
//  buat  variabel  untuk  menampung data 010:	$nis	=  $data['nis'];
$nama	=  $data['nama'];
$tempat_lahir  =  $data['tempat_lahir'];
$tanggal_lahir  =  date('d-m-Y',  strtotime($data['tanggal_lahir'])); 014:	$jenis_kelamin  =  $data['jenis_kelamin'];
$agama	=  $data['agama']; 016:	$alamat	=  $data['alamat']; 017:	$no_hp	=  $data['no_hp'];
$foto	=  $data['foto']; 019:  }
 //  tutup  koneksi 021:  mysqli_close($db);
 ?>

 <div class="row">
	<div  class="col-md-12">
	<div class="alert alert-info" role="alert"> 027:		<i  class="fas  fa-edit"></i>  Ubah  Data Siswa 028:	</div>

	<div class="card">
	<div class="card-body">
	<!-- form ubah data siswa -->
	<form class="needs-validation" action="proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
	<div class="row">
	<div class="col">
	<div  class="form-group  col-md-12">
	<label>NIS</label>
	<input type="text" class="form-control" name="nis" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $nis; ?>" readonly required>
	<div class="invalid-feedback">NIS tidak boleh kosong.</div>
	</div>

	<div  class="form-group  col-md-12">
	<label>Nama Siswa</label>
	<input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
		<div  class="invalid-feedback">Nama  siswa  tidak  boleh  kosong.</div> 046:	</div>

	<div  class="form-group  col-md-12">
	<label class="mb-3">Jenis Kelamin</label>
	<?php
	if  ($jenis_kelamin=='Laki-laki')  {  ?>
	<div class="custom-control custom-radio">
	<input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-laki" checked required>
		<label class="custom-control-label" for="customControlValidation2">Laki-laki</label> 055:	</div>
	<div  class="custom-control  custom-radio  mb-4">
	<input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" required>
	<label class="custom-control-label" for="customControlValidation3">Perempuan</label> 059:	<div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
	</div>
	<?php
	}  else  {  ?>
	<div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-laki" required>
		<label class="custom-control-label" for="customControlValidation2">Laki-laki</label> 066:	</div>
	<div  class="custom-control  custom-radio  mb-4">
	<input  type="radio"  class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" checked required>
	<label class="custom-control-label" for="customControlValidation3">Perempuan</label> 070:	<div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
	</div>
	<?php } ?>
	</div>

	<div  class="form-group  col-md-12">
	<label>Agama</label>
	<select class="form-control" name="agama" autocomplete="off" required> 078:		<option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
	<option value="Islam">Islam</option>
	<option value="Kristen Protestan">Kristen Protestan</option>
	<option value="Kristen Katolik">Kristen Katolik</option>
	<option value="Hindu">Hindu</option>
	<option value="Buddha">Buddha</option>
	</select>
	<div class="invalid-feedback">Agama tidak boleh kosong.</div>
	</div>
	</div>

	<div class="col">
	<div  class="form-group  col-md-12">
	<label>Tempat Lahir</label>
	<input type="text" class="form-control" name="tempat_lahir" autocomplete="off" value="<?php echo $tempat_lahir; ?>" required>
		<div class="invalid-feedback">Tempat Lahir tidak boleh kosong.</div> 094:	</div>

	<div  class="form-group  col-md-12">
	<label>Tanggal Lahir</label>
	<input  type="text"  class="form-control  date-picker"  data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
		<div class="invalid-feedback">Tanggal Lahir tidak boleh kosong.</div> 100:	</div>

	<div  class="form-group  col-md-12">
	<label>Alamat</label>
	<textarea class="form-control" rows="2" name="alamat" autocomplete="off" required>
<?php echo $alamat; ?></textarea>
	<div class="invalid-feedback">Alamat tidak boleh kosong.</div>
	</div>

	<div  class="form-group  col-md-12">
	<label>No. HP</label>
	<input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $no_hp; ?>" required>
	<div class="invalid-feedback">No. HP tidak boleh kosong.</div>
	</div>
	</div>

	<div class="col">
	<div  class="form-group  col-md-12">
	<label>Foto siswa</label>
<input  type="file"  class="form-control-file  mb-3"  id="foto"  name="foto" onchange="return validasiFile()" autocomplete="off" value="<?php echo $foto; ?>">
		<div id="imagePreview"><img class="foto-preview" src="foto/<?php echo $foto; ?>"/></div> 120:	</div>
	</div>
	</div>

	<div  class="my-md-4  pt-md-1  border-top">  </div> 125:
	<div  class="form-group  col-md-12  right">
	<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan"> 128:	<a href="index.php" class="btn btn-secondary btn-reset"> Batal </a>
	</div>
	</form>
	</div>
	</div>
	</div>
 </div>