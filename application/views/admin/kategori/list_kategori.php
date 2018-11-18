 <?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-info">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//Include tambah kategori
include('tambah_kategori.php');
?>

<br></br>

<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th width="5%">No.</th>
    <th>Nama Kategori</th>
    <th>Slug Kategori</th>
    <th>Nomor Urut</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>

<?php $i=1; foreach ($kategori as $kategori) { ?>
      
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $kategori->nama_kategori ?></td>
    <td><?php echo $kategori->slug_kategori ?></td>
    <td><?php echo $kategori->urutan ?></td>
    <td>
        <a href="<?php echo base_url('admin/kategori/edit_kategori/'.$kategori->id_kategori) ?>" title="Edit kategori" class="btn btn-warning btn-xs">
            <i class="fa fa-edit"></i> Edit
        </a>

        <?php
        //Link delete
        include('delete_kategori.php');
        ?>
        
    </td>
  </tr>    

<?php $i++;
}
?>

</tbody>
</table>