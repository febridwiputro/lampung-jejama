 <?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-info">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>  

<p>
    <a href="<?php echo base_url('admin/berita/tambah_berita') ?>" title="Tambah Berita Baru" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p>

<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th width="5%">No.</th>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Jenis - Status</th>
    <th>Penulis</th>
    <th>Tanggal</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>

<?php $i=1; foreach ($berita as $berita) { ?>
      
  <tr>
    <td><?php echo $i ?></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'
                                      .$berita->gambar) ?>" width="60"></td>
    <td><?php echo $berita->judul_berita ?></td>
    <td><?php echo $berita->jenis_berita ?> - 
        <?php echo $berita->status_berita ?></td>
    <td><?php echo $berita->nama ?></td>
    <td><?php echo $berita->tanggal_post ?></td>
    <td>
        <a href="<?php echo base_url('admin/berita/edit_berita/'.$berita->id_berita) ?>" title="Edit berita" class="btn btn-warning btn-xs">
            <i class="fa fa-edit"></i> Edit
        </a>

        <?php
        //Link delete
        include('delete_berita.php');
        ?>
        
    </td>
  </tr>

<?php $i++;
}
?>

</tbody>
</table>