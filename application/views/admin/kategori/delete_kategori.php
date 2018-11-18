<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $kategori->id_kategori ?>  ">
	<i class="fa fa-trash-o"></i>Delete
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $kategori->id_kategori ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Menghapus data</h4>
      </div>
      <div class="modal-body">
        <p> Yakin ingin menghapus data ini ? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal"> <i class="fa fa-backward"></i> Tidak, batalkan </button>

        <a href="<?php echo base_url('admin/kategori/delete_kategori/'.$kategori->id_kategori) ?>" class="btn btn-outline pull-right"> <i class="fa fa-trash-o"></i> Ya, Hapus Data ini </a>
      </div>
    </div>   
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->