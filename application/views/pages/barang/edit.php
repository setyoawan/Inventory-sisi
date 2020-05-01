<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Barang</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" action="<?= base_url('barang/update/') . $data->id; ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input name="id" placeholder="ID" class="form-control" type="text" value="<?= $data->id ?>">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" placeholder="name" class="form-control" type="text" value="<?= $data->name ?>">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <input name="brand" placeholder="brand" class="form-control" type="text" value="<?= $data->brand ?>">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input name="type" placeholder="type" class="form-control" type="text" value="<?= $data->type ?>">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" placeholder="image" class="form-control" type="file" value="<?= $data->image ?>">
                        <span class="help-block"></span>
                    </div>
                      
                       
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
