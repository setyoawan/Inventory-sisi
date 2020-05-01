<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Menu</h3>
            </div>
            


                <form method="post" action="<?= base_url('barang/store'); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                    
                    <div class="form-group">
                            <label>kode</label>
                            <input name="kode" placeholder="kode" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>name</label>
                            <input name="name" placeholder="nama" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>brand</label>
                            <input name="brand" placeholder="brand" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>type</label>
                            <input name="type" placeholder="type" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>image</label>
                            <input name="image" class="form-control" type="file">
                            <span class="help-block"></span>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary float-right" name="submit" type="submit">Buat</button>
                    </div>
                </form>
            
        </div>
    </div>
</div>
