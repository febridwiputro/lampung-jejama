<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error_upload))
{
	echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}

//Atribut
$attribut = 'class="alert alert-info"';
//Form open
echo form_open(base_url('admin/berita/tambah_berita'),$attribut);
?>

<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul_berita') ?> " required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Status Berita</label>
		<select name="status_berita" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft">Draft</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Profil">Profil</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Kategori Berita</label>
		<select name="id_kategori" class="form-control">
			
			<?php foreach ($kategori as $kategori) { ?>
				<option value="<?php echo $kategori->id_kategori ?>">
					<?php echo $kategori->nama_kategori ?>
				</option>
			<?php } ?>  
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Profil">Profil</option>
		</select>
	</div>
</div>

<div class="clearfix"></div>
<?php
//Form close
echo form_close();
?>