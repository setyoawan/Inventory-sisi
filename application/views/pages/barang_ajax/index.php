<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Barang</h3>
            </div>  
            <div class="box-body">
                <table class="table table-responsive" id="barangku">
                    <thead>
                        <tr>
                            <th>nomor</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>  
            <div class="box-footer">
                <!-- <i href="<?=base_url('barang/create')?>" class="btn btn-primary"><i class="fa fa-plus"></i></a> -->
                <?php if ($this->auth->prvilege_check('barang_ajax', 'create')) { ?>
                <button type="button" class="btn btn-primary" onclick="create()"><i class="fa fa-plus"></i></button>
                <?php } ?>
            </div>
        </div>
    </div>  
</div>


<div class="modal fade" id="barang-modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Barang</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<form action="#" method="post" id="barang-form" enctype="multipart/form-data">
<div class="form-group">
<label for="">Kode</label>
<input name="id" placeholder="kode" class="form-control" type="text" required="">
</div>
<div class="form-group">
<label for="">Nama</label>
<input name="name" placeholder="name" class="form-control" type="text" required="">
</div>
<div class="form-group">
<label for="">Brand</label>
<select name="brand" id="brand" class="form-control" required="">
<option value="">-- Pilih Brand --</option>
<option value="Polygon">Polygon</option>
<option value="Wim Cycle">Wim Cycle</option>
</select>
</div>
<div class="form-group">
<label for="">Type</label>
<select name="type" id="type" class="form-control" required="">
<option value="">-- Pilih Type --</option>
<option value="Sepeda">Sepeda</option>
<option value="Mobil">Mobil</option>
</select>
</div>
<div class="form-group">
<label for="">Gambar</label>
<input name="image" class="form-control" type="file" required="">
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" onclick="save()" id="btn-save">Save</button>
<button type="button" class="btn btn-primary" onclick="" id="btn-update">Update</button>
</div>

</div>
</div>
</div>

<script>
    var table;
    $(function () {
        table = $('#barangku').DataTable({
            ajax: '<?= base_url('barang_ajax/get_data') ?>',
            columns: [
                {data: 'no'},
                {data: 'id'},
                {data: 'name'},
                {data: 'brand'},
                {data: 'type'},
                {data: 'image'},
                {data: 'action'}
            ]
        });
    });
    
</script>

<script>
function create() {
        $('#barang-form')[0].reset();
        $('#btn-save').show();
        $('#btn-update').hide();
        $('#barang-modal').modal('show');

    }
</script>

<script>
function save() {
    var data = new FormData($('#barang-form')[0]);
    var url = '<?= base_url('barang_ajax/store') ?>';
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            if (response.status_code == 1) {
                $('#barang-modal').modal('hide');
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
</script>

<script>
function edit(id) {
    var url = '<?= base_url('barang_ajax/edit/')?>' + id;
    $.ajax({
        url:url,
        type:'GET',
        success: function (response) {
            if (response.status_code == 1) {
                $('[name="id"]').val(response.data.id);
                $('[name="name"]').val(response.data.name);
                $('[name="brand"]').val(response.data.brand);
                $('[name="type"]').val(response.data.type);

                $('#btn-save').hide();
                $('#btn-update').attr('onclick', "update('" + response.data.id + "')");
                $('#btn-update').show();
                $('#barang-modal').modal('show');
            } else {
                alert(response.message);
            }
        }
    });
}
</script>

<script>
function update(id)  {
    var data = new FormData($('#barang-form')[0]);
    var url = '<?= base_url('barang_ajax/update/')?>' + id;
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData:false,
        contentType:false,
        cache:false,
        success: function (response) {
            if (response.status_code == 1) {
                $('#barang-modal').modal('hide');
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
</script>

<script>
function remove(id) {
    if (confirm('Are you sure delete this data?')) {
        $.get('<?= base_url('barang_ajax/delete/')?>' + id)
        .done(function (response) {
            if (response.status_code == 1) {
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        })
    }
}
</script>