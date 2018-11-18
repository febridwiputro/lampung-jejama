<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//Attribut
$attribut = 'class="form-horizontal"';

//Form open
echo form_open(base_url('admin/kategori/edit_kategori/'.$kategori->id_kategori),$attribut);
?>

<div class="form-group">
    <label class="col-sm-3 control-label">Nama Kategori</label>

    <div class="col-sm-9">
        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" value="<?php echo $kategori->nama_kategori?> ">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Urutan Kategori</label>

    <div class="col-sm-9">
        <input type="number" class="form-control" name="urutan" placeholder="Urutan kategori" value="<?php echo $kategori->urutan ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">

        <input type="submit" class="btn btn-success" value="Simpan Data">
    </div>
</div>


<?php
// form close
echo form_close();
?>