<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Barang</h3>
			</div>	
			<div class="box-body">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Name</th>
							<th>Brand</th>
                            <th>Type</th>
                            <th>Image</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $value) { ?>
							<tr>
								<td><?= $value->kd_brg ?></td>
								<td><?= $value->name ?></td>
								<td><?= $value->brand ?></td>
								<td><?= $value->type ?></td>
								<td><img style="height: 50px; width: 50px;" src="<?= base_url('assets/img/barang/') . $value->image; ?>"></td>
								<td>
									<a href="<?= base_url('barang/edit/'). $value->id ?>" class="btn btn-warning">
										<i class="fa fa-pencil"> </i>
									</a>
									<a href="<?= base_url('barang/delete/'). $value->id ?>" class="btn btn-danger"
										onclick="return confirm('Are you sure about that?');">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>	
			<div class="box-footer">
				<a href="<?=base_url('barang/create')?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
			</div>
		</div>
	</div>	
</div>